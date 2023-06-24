const mysql = require('mysql');
const express = require('express');
const bodyparser = require('body-parser');
var path = require('path');
const cors = require("cors");
const nodemailer = require('nodemailer');
const { body, validationResult } = require('express-validator');

const app = express();


var corsOptions = {
  origin: "http://localhost:5000"
};

app.use(cors(corsOptions));
//Configuring express server
// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

// parse requests of content-type - application/json
app.use(express.json());

// parse requests of content-type - application/x-www-form-urlencoded
app.use(express.urlencoded({ extended: false }));

app.use("/public", express.static(__dirname + "/public"));

const Webpage = require("./models/webpage.model.js");
const GalleryImage = require("./models/galleryimage.model.js");
const BoxItem = require("./models/boxitem.model.js");


function getWebpage(req, res, view, success)
{
  const id = req.query.id;
  Webpage.getAll(id, (err, data1) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while retrieving webpages."
      });
    else {
      
      BoxItem.getAll(id, (err, data2) => {
        if (err)
          res.status(500).send({
            message:
              err.message || "Some error occurred while retrieving boxitems."
          });
        else {
          GalleryImage.getAll(id, (err, data3) => {
            if (err)
              res.status(500).send({
                message:
                  err.message || "Some error occurred while retrieving galleryimages."
              });
            else {
              res.render(view, {
                results3: data3,
                results2: data2, 
                results1: data1,
                success: success
              });
            }
          });
        };
        
      });      
    }
      
  }); 
}


app.get("/admin", (req, res) => {
  const reject = () => {
    res.setHeader("www-authenticate", "Basic");
    res.sendStatus(401);
  };

  const authorization = req.headers.authorization;

  if (!authorization) {
    return reject();
  }

  const [username, password] = Buffer.from(
    authorization.replace("Basic ", ""),
    "base64"
  )
    .toString()
    .split(":");

  if (!(username === "admin" && password === "password123")) {
    return reject();
  }

  
});

app.post("/admin/update/:id", (req, res) => {
  Webpage.updateById(
    req.params.id,
    new Webpage(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found webpage with id ${req.params.id}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating webpage with id " + req.params.id
          });
        }
      }
      for(var i = 0, x = 1; i < 4; i++, x++) {
        const boxitem = { id: x, title: req.body["boxitem_title_" + x], subtitle: req.body["boxitem_subtitle_" + x], webpage_id: 1 }
        BoxItem.updateById(
          boxitem.id,
          new BoxItem(boxitem),
          (err, data) => {
            if (err) {
              if (err.kind === "not_found") {
                res.status(404).send({
                  message: `Not found box with id ${req.params.id}.`
                });
              } else {
                res.status(500).send({
                  message: "Error updating box with id " + req.params.id
                });
              }
            } 
          }
        );
      }
      
      for (var i = 0, x = 1; i < 12; i++, x++) {
        const galleryimage = { 
          id: x, 
          active: req.body["galleryimage_active_" + x] == "on" ? 1 : 0, 
          title: req.body["galleryimage_title_" + x], 
          subtitle: req.body["galleryimage_subtitle_" + x], 
          thumbimage: req.body["galleryimage_thumbimage_" + x], 
          mainimage: req.body["galleryimage_mainimage_" + x], 
          webpage_id: 1 
        }
        GalleryImage.updateById(
          galleryimage.id,
          new GalleryImage(galleryimage),
          (err, data) => {
            if (err) {
              if (err.kind === "not_found") {
                res.status(404).send({
                  message: `Not found GalleryImage with id ${req.params.id}.`
                });
              } else {
                res.status(500).send({
                  message: "Error updating GalleryImage with id " + req.params.id
                });
              }
            }
          }
        );
      }
      res.redirect("/admin");
    }
  );
});

app.get("/", (req, res) => {
  const id = req.query.id;
  getWebpage(req, res, "webpage", "none");
});

const transporter = nodemailer.createTransport({
  host: "smtp.dreamhost.com",
  port: 465,
  auth: {
      user: 'fcr@firstcapitalrestoration.com',
      pass: 'FirstCap23!',
  },
});

app.post('/', 
(req, res) => {
    const {name, email, subject, message } = req.body;
    if (name == '' || subject == '' || message == '') {
      getWebpage(req, res, "webpage", "error");
    }

    const mailData = {
        from: "fcr@firstcapitalrestoration.com",
        to: "halford@colite.com",
        replyTo: email,
        subject: subject,
        text: "You have recieved a new contact form submission from " + name + ".\nReply-To: " + email + "\n\nMessage:\n " + message
    };
    transporter.sendMail(mailData, (error, info) => {
        if (error) {
          console.log(error);
          getWebpage(req, res, "webpage", "error");
        }
        getWebpage(req, res, "webpage", "success");
        
    });
  
  getWebpage(req, res, "webpage", "error");
});

// set port, listen for requests
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}.`);
});




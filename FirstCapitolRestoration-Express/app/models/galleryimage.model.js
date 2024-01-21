
const sql = require("./db.js");

// constructor
const GalleryImage = function(galleryimage) {
  this.id = galleryimage.id;
  this.title = galleryimage.title;
  this.subtitle = galleryimage.subtitle;
  this.thumbimage = galleryimage.thumbimage;
  this.mainimage = galleryimage.mainimage;
  this.active = galleryimage.active;
  this.webpage_id = galleryimage.webpage_id;
};

GalleryImage.create = (newGalleryImage, result) => {
  sql.query("INSERT INTO galleryimage SET ?", newGalleryImage, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created galleryimage: ", { id: res.insertId, ...newGalleryImage });
    result(null, { id: res.insertId, ...newGalleryImage });
  });
};

GalleryImage.findById = (id, result) => {
  sql.query(`SELECT * FROM galleryimage WHERE id = ${id}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found galleryimage: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found GalleryImage with the id
    result({ kind: "not_found" }, null);
  });
};

GalleryImage.getAll = (webpage_id, result) => {
  let query = "SELECT * FROM galleryimage";

  if (webpage_id) {
    query += ` WHERE webpage_id = ${webpage_id}`;
  }

  sql.query(query, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("galleryimage: ", res);
    result(null, res);
  });
};

GalleryImage.getAllActive = result => {
  sql.query("SELECT * FROM galleryimage WHERE active=true", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("galleryimage: ", res);
    result(null, res);
  });
};

GalleryImage.updateById = (id, galleryimage, result) => {
  sql.query(
    "UPDATE galleryimage SET title = ?, subtitle = ?, thumbimage = ?, mainimage = ?, active = ?, webpage_id = ? WHERE id = ?",
    [galleryimage.title, galleryimage.subtitle, galleryimage.thumbimage, galleryimage.mainimage, galleryimage.active, galleryimage.webpage_id, id],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found GalleryImage with the id
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated galleryimage: ", { id: id, ...galleryimage });
      result(null, { id: id, ...galleryimage });
    }
  );
};



GalleryImage.remove = (id, result) => {
  sql.query("DELETE FROM galleryimage WHERE id = ?", id, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found GalleryImage with the id
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted galleryimage with id: ", id);
    result(null, res);
  });
};

GalleryImage.removeAll = result => {
  sql.query("DELETE FROM galleryimage", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} galleryimage`);
    result(null, res);
  });
};

module.exports = GalleryImage;


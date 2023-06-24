
const sql = require("./db.js");

// constructor
const Webpage = function(webpage) {
  this.id = webpage.id;
  this.bannertext = webpage.bannertext;
  this.bannerbackgroundimage = webpage.bannerbackgroundimage;
  this.bannerlogoimage = webpage.bannerlogoimage;
  this.sectionone_title = webpage.sectionone_title;
  this.sectionone_subtitle = webpage.sectionone_subtitle;
  this.sectiontwo_title = webpage.sectiontwo_title;
  this.sectiontwo_subtitle = webpage.sectiontwo_subtitle;
  this.sectiontwo_image = webpage.sectiontwo_image;
  this.sectionthree_title = webpage.sectionthree_title;
  this.sectionthree_subtitle = webpage.sectionthree_subtitle;
  this.sectionthree_image = webpage.sectionthree_image;
  this.sectionfour_title = webpage.sectionfour_title;
  this.sectionfour_subtitle = webpage.sectionfour_subtitle;
  this.sectionfour_image = webpage.sectionfour_image;
  this.sectionfive_title = webpage.sectionfive_title;
  this.sectionfive_subtitle = webpage.sectionfive_subtitle;
};

Webpage.create = (newWebpage, result) => {
  sql.query("INSERT INTO webpage SET ?", newWebpage, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created webpage: ", { id: res.insertId, ...newWebpage });
    result(null, { id: res.insertId, ...newWebpage });
  });
};

Webpage.findById = (id, result) => {
  sql.query(`SELECT * FROM webpage WHERE id = ${id}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found webpage: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Webpage with the id
    result({ kind: "not_found" }, null);
  });
};

Webpage.getAll = (id, result) => {
  let query = "SELECT * FROM webpage";

  if (id) {
    query += ` WHERE id = ${id}`;
  }

  sql.query(query, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("webpage: ", res);
    result(null, res);
  });
};


Webpage.updateById = (id, webpage, result) => {
  sql.query(
    "UPDATE webpage SET bannertext = ?, bannerbackgroundimage = ?, bannerlogoimage = ?, sectionone_title = ?, sectionone_subtitle = ?, " +
    "sectiontwo_title =? , sectiontwo_subtitle = ?, sectiontwo_image = ?, sectionthree_title =? , sectionthree_subtitle = ?, " +
    "sectionthree_image = ?, sectionfour_title =? , sectionfour_subtitle = ?, sectionfour_image = ?, sectionfive_title =? , " +
    "sectionfive_subtitle = ? WHERE id = ?",
    [webpage.bannertext, webpage.bannerbackgroundimage, webpage.bannerlogoimage, webpage.sectionone_title, webpage.sectionone_subtitle, 
      webpage.sectiontwo_title,webpage.sectiontwo_subtitle, webpage.sectiontwo_image, webpage.sectionthree_title,webpage.sectionthree_subtitle, 
      webpage.sectionthree_image, webpage.sectionfour_title,webpage.sectionfour_subtitle, webpage.sectionfour_image, webpage.sectionfive_title,
      webpage.sectionfive_subtitle, id],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found Webpage with the id
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated webpage: ", { id: id, ...webpage });
      result(null, { id: id, ...webpage });
    }
  );
};

Webpage.remove = (id, result) => {
  sql.query("DELETE FROM webpage WHERE id = ?", id, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found Webpage with the id
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted webpage with id: ", id);
    result(null, res);
  });
};

Webpage.removeAll = result => {
  sql.query("DELETE FROM webpage", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} webpage`);
    result(null, res);
  });
};

module.exports = Webpage;



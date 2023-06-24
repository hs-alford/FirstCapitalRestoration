
const sql = require("./db.js");

// constructor
const BoxItem = function(boxitem) {
  this.id = boxitem.id;
  this.title = boxitem.title;
  this.subtitle = boxitem.subtitle;
  this.webpage_id = boxitem.webpage_id;
};

BoxItem.create = (newBoxItem, result) => {
  sql.query("INSERT INTO boxitem SET ?", newBoxItem, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created boxitem: ", { id: res.insertId, ...newBoxItem });
    result(null, { id: res.insertId, ...newBoxItem });
  });
};

BoxItem.findById = (id, result) => {
  sql.query(`SELECT * FROM boxitem WHERE id = ${id}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found boxitem: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found BoxItem with the id
    result({ kind: "not_found" }, null);
  });
};

BoxItem.getAll = (webpage_id, result) => {
  let query = "SELECT * FROM boxitem";

  if (webpage_id) {
    query += ` WHERE webpage_id = ${webpage_id}`;  }

  sql.query(query, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("boxitem: ", res);
    result(null, res);
  });
};


BoxItem.updateById = (id, boxitem, result) => {
  let update = "UPDATE boxitem SET title = '" + boxitem.title + "', subtitle = '" + boxitem.subtitle + "', webpage_id = " + boxitem.webpage_id + " WHERE id = " + id; 
  sql.query(update, (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found BoxItem with the id
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated boxitem: ", { id: id, ...boxitem });
      result(null, { id: id, ...boxitem });
    }
  );
};

/*
BoxItem.updateById = (webpage_id, boxitems, result) => {

  let items = {}

  let query = "SELECT * FROM boxitem";

  if (webpage_id) {
    query += ` WHERE webpage_id = ${webpage_id}`;  }

  items = sql.query(query, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("boxitem: ", res);
    return res;
  });

  for (var i = 0; i < boxitems.length; i++)
  {
    var item_id = boxitems[i].id;
    var item_title = boxitems[i].title;
    var item_subtitle = boxitems[i].subtitle;

    sql.query( 
      "UPDATE boxitem SET id = ?, title = ?, subtitle = ?, webpage_id = ? WHERE id = ?",
      [item_id, item_title, item_subtitle, webpage_id, item_id],
      (err, res) => {
        if (err) {
          console.log("error: ", err);
          result(null, err);
          return;
        }
  
        if (res.affectedRows == 0) {
          // not found BoxItem with the id
          result({ kind: "not_found" }, null);
          return;
        }
  
        console.log("updated boxitem: ", { id: id, ...boxitem });
        result(null, { id: id, ...boxitem });
      }
    );
  }
  
};
*/



BoxItem.remove = (id, result) => {
  sql.query("DELETE FROM boxitem WHERE id = ?", id, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found BoxItem with the id
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted boxitem with id: ", id);
    result(null, res);
  });
};

BoxItem.removeAll = result => {
  sql.query("DELETE FROM boxitem", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} boxitem`);
    result(null, res);
  });
};

module.exports = BoxItem;

import mysql from "mysql";

export const db = mysql.createConnection({
    host: "localhost",
    port: 3301,
    user: "root",
    password: "MaCl@891",
    database: "crud"
});

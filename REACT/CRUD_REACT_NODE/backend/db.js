import mysql from "mysql";

export const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "@LB@572",
    database: "crud"
})
import { db } from "../db.js";

export const getUsers = (_, res) => {
  const q = "SELECT * FROM usuarios";

  db.query(q, (err, data) => {
    if (err) {
      console.error("Erro ao buscar usuários:", err.message);
      return res.status(500).json({ error: "Erro ao buscar usuários" });
    }

    return res.status(200).json(data);
  });
};

import { Express } from "express";

const app = express();

app.use(express.json());
app.use(cors());

app.listen(8800);
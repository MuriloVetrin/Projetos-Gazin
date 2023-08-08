import { Router } from 'express';

import { CreateUserController } from './controllers/user/CreateUserController'

const router = Router();

/*
   O cara bate nas nossas rota /users e chama o0 nosso controller 
   
   O controller pega os dados do body -> executa o serviço
   
   E esse execute vai devolver na variavel user o retorno que voce vai devolver pro usuario
 */

router.post('/users', new CreateUserController().handle)

export { router };
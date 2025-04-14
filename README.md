## Su Linux
`MY_UID=$(id -u) MY_GID=$(id -g) docker-compose up`

## Su Windows
`docker-compose up`


1)recuperare tutte le classi
curl http://localhost:8080/classi
Richiesta:
$app->get('/classi', "ClassiController:index");
Risposta:
[{"id":"1","sezione":"5A","anno":"2024"},{"id":"2","sezione":"5B","anno":"2024"}]

2)recuperare una singola classe tramite ID
curl http://localhost:8080/classi/1
Richiesta:
$app->get('/classi/{id}', "ClassiController:show");
Risposta:
[{"id":"1","sezione":"5A","anno":"2024"}]

3)creare una nuova classe.
curl -X POST http://localhost:8080/classi -H "Content-Type: application/json" -d '{"sezione": "5C", "anno": "2025"}'
Richiesta:
$app->post('/classi', "ClassiController:create");
Risposta:
{"msg":"ok"}
{"id":"3","sezione":"5C","anno":"2025"}

4)aggiornare le informazioni di una classe.
curl -X PUT http://localhost:8080/classi/3 -H "Content-Type: application/json" -d '{"sezione": "4C", "anno": "2024"}'
Richiesta:
$app->put('/classi/{id}', "ClassiController:update");
Risultato:
{"msg":"ok"}
{"id":"3","sezione":"4C","anno":"2024"}

5)eliminare una classe.
curl -X DELETE http://localhost:8080/classi/3
Richiesta:
$app->delete('/classi/{id}', "ClassiController:delete");
Risultato:
{"msg":"ok"}
[]


1)recuperare tutti gli alunni di una classe.
curl http://localhost:8080/classi/1/alunni
Richiesta:
$app->get('/classi/{classe_id}/alunni', "AlunniController:index");
Risposta:
[{"id":"1","nome":"Claudio","cognome":"Benve","classe_id":"1"},{"id":"2","nome":"Ivan","cognome":"Bruno","classe_id":"1"}]

2)recuperare un singolo alunno tramite id.
curl http://localhost:8080/alunni/2
Richiesta:
$app->get('/alunni/{id}', "AlunniController:show");
Risposta:
[{"id":"2","nome":"Ivan","cognome":"Bruno","classe_id":"1"}]

3)Creare un nuovo alunno per una classe.
curl -X POST http://localhost:8080/classi/2/alunni -H "Content-Type: application/json" -d '{"nome": "Leon", "cognome": "Lo Preiato"}'
Richiesta:
$app->post('/classi/{classe_id}/alunni', "AlunniController:create");
Risposta:
{"msg":"ok"}
{"nome": "Leon", "cognome": "Lo Preiato"}

4)Aggiornare le informazioni di un alunno.
curl -X PUT http://localhost:8080/classi/3/alunni -H "Content-Type: application/json" -d '{"nome": "Mattia", "cognome": "Negri"}'
Richiesta:
$app->put('/classi/{id}/alunni', "AlunniController:update");
Risposta:

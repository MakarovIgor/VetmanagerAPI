# VetmanagerAPI Example
Work with API Vetmanager

Основные Запросы:
================
      [GET] http://yoursite.com/rest/api/post/ (returns all posts) 
      [GET] http://yoursite.com/rest/api/post/1 (returns post with PK=1) 
      [POST] http://yoursite.com/rest/api/post/ (create new post) 
      [PUT] http://yoursite.com/rest/api/post/1 (update post with PK=1) 
      [DELETE] http://yoursite.com/rest/api/post/1 (delete post with PK=1):

# Фильтрация данных
    /api/post/?
    limit=2
    &offset=1
    &sort=[{'property':'title','direction':'ASC'}]
    &filter=[{'property':'title', 'value':'some value'},{'property':'comment', 'value':'You need a REST', 'operator':'='}]
    
#Доступные операторы в фильтре:
    
    ‘=’, ‘!=’ | ‘<>’
    ‘<‘, ‘<=’, ‘>’, ‘>=’
    ‘in’, ‘not in’ ( в занчение value необходимо передавать массив )
    ‘like’
    
#Пример фильтрации данных
    
    limit=2&offset=1&filter = [
    {"property": "id", "value" : 50, "operator": ">="}
    , {"property": "user_id", "value" : [1, 5, 10, 14], "operator": "in"}
    , {"property": "state", "value" : ["save", "deleted"], "operator": "not in"}
    , {"property": "date", "value" : "2013-01-01", "operator": ">="}
    , {"property": "date", "value" : "2013-01-31", "operator": "<="}
    , {"property": "type", "value" : 2, "operator": "!="}
    ]
#Примеры из коммандной строки
GET

    #List
          curl -i -H "Accept: application/json" -H "X_REST_API_KEY: some_key" http://test.vetmanager.ru/rest/api/sample/
    
    #View
    
          curl -l -H "Accept: application/json" -H "X_REST_API_KEY: some_key" http://test.vetmanager.ru/rest/api/sample/174
POST

    Create
          curl -l -H "Accept: application/json" -H "X_REST_API_KEY: some_key" -X \
    POST -d '{"id":"175","name":"Six Alive one ever Updated Again","desc":"It really is or should be at an honor","notes":"this is a note"}' \
    http://test.vetmanager.ru/rest/api/sample
    
          curl -l -H "Accept: application/json" -H "X_REST_API_KEY: some_key" -X \
    POST -d '[{"id":"175","name":"Six Alive one ever Updated Again","desc":"It really is or should be at an honor","notes":"this is a note"}, \
    {"id":"176","name":"First.3 one ever Updated Again","desc":"It really is or should be at an honor","notes":"this is a note"}]' \
    http://test.vetmanager.ru/rest/api/sample
PUT

    Update
        curl -l -H "Accept: application/json" -H "X_REST_API_KEY: some_key" -H "X-HTTP-Method-Override: PUT" -X \
    PUT -d '{"id":"174","name":"Five.1 Alive one ever Updated Again","desc":"It really is or should be at an honor","notes":"this is a note"}' \
    http://test.vetmanager.ru/rest/api/sample/174
DELETE

    curl -l -H "Accept: application/json" -H "X_REST_API_KEY: some_key" -H "X-HTTP-Method-Override: DELETE" -X DELETE http://test.vetmanager.ru/rest/api/sample/175
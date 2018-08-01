# Demo

A small demo for testing purpose. Implemented upload .json file via http request, parse all content from .json and pass them to database, retrieve those data and display at table form on web page.

### Environment

symfony v4.1|symfony server
php 7.19
mysql 5.0+

### Deployment
1. Open windows cmd/linux terminal, get into file root `cd ../../jsonuploadkick`, install dependencies `composer install`.
2. Configure database information in `/.env` file, find row `DATABASE_URL=mysql://{username}:{password}@127.0.0.1:3306/{dbname}`
4. Run `php bin/console server:run` or `$ .bin/console server:run`  

### Database
    MySql 5.7.9 (Integrated with WampServer 3)
    dbname: Json
    dbtable: Json

### Enjoy
    localhost:8000
    test source: source.json"# jsonuploaddemo"

### Github
    https://github.com/GYLngm/jsonuploaddemo.git
"# jsonuploaddemo" 

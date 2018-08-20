// Load HTTP module
var http = require("http");

// Create HTTP server and listen on port 8000 for requests
http.createServer(function(request, response) {

   // Set the response HTTP header with HTTP status and Content type
   response.writeHead(200, {'Content-Type': 'text/plain'});
   
   // Send the response body "Hello World"
   response.end('Hello World\n');
}).listen(8000);

// Print URL for accessing server
console.log('Server running at http://127.0.0.1:8000/');



var url = require('url'); //module url
var q = url.parse(req.url, true).query;
var txt = q.year + " " + q.month;
res.end(txt);
// to get req.url object

var url = require('url');
var adr = 'http://localhost:8080/default.htm?year=2017&month=february';
var q = url.parse(adr, true);

console.log(q.host); //returns 'localhost:8080'
console.log(q.pathname); //returns '/default.htm'
console.log(q.search); //returns '?year=2017&month=february'

var qdata = q.query; //returns an object: { year: 2017, month: 'february' }
console.log(qdata.month); //returns 'february'


var http = require('http');
var url = require('url');
var fs = require('fs');

http.createServer(function (req, res) {
  var q = url.parse(req.url, true);
  var filename = "." + q.pathname;
  fs.readFile(filename, function(err, data) {
    if (err) {
      res.writeHead(404, {'Content-Type': 'text/html'});
      return res.end("404 Not Found");
    }  
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write(data);
    return res.end();
  });
}).listen(8080);



var fs = require('fs'); //module filesystem
fs.readFile('demofile1.html', function(err, data) {
res.writeHead(200, {'Content-Type': 'text/html'});
res.write(data);

create file
fs.appendFile() //appends specified content to a file. If the file does not exist, the file will be created:
fs.appendFile('mynewfile1.txt', 'Hello content!', function (err) {
    if (err) throw err;
    console.log('Saved!');
});

fs.open() //takes a "flag" as the second argument, if the flag is "w" for "writing", the specified file is opened for writing. If the file does not exist, an empty file is created:
fs.open('mynewfile2.txt', 'w', function (err, file) {
    if (err) throw err;
    console.log('Saved!');
});

fs.writeFile() // replaces the specified file and content if it exists. If the file does not exist, a new file, containing the specified content, will be created:
fs.writeFile('mynewfile3.txt', 'Hello content!', function (err) {
  if (err) throw err;
  console.log('Saved!');
});

update file

fs.appendFile('mynewfile1.txt', ' This is my text.', function (err) {
  if (err) throw err;
  console.log('Updated!');
});
fs.writeFile('mynewfile3.txt', 'This is my text', function (err) {
  if (err) throw err;
  console.log('Replaced!');
});

Delete file

fs.unlink('mynewfile2.txt', function (err) {
  if (err) throw err;
  console.log('File deleted!');
});

Rename file
fs.rename('mynewfile1.txt', 'myrenamedfile.txt', function (err) {
  if (err) throw err;
  console.log('File Renamed!');
});

//event
var fs = require('fs');
var rs = fs.createReadStream('./demofile.txt');
rs.on('open', function () {
  console.log('The file is open');
});



//event module
var events = require('events');
var eventEmitter = new events.EventEmitter();

//Create an event handler:
var myEventHandler = function () {
  console.log('I hear a scream!');
}

//Assign the event handler to an event:
eventEmitter.on('scream', myEventHandler);

//Fire the 'scream' event:
eventEmitter.emit('scream');

//formidable module to upload file
var formidable = require('formidable'); 

var http = require('http');

//1. buat upload form
http.createServer(function (req, res) {
  res.writeHead(200, {'Content-Type': 'text/html'});
  res.write('<form action="fileupload" method="post" enctype="multipart/form-data">');
  res.write('<input type="file" name="filetoupload"><br>');
  res.write('<input type="submit">');
  res.write('</form>');
  return res.end();
}).listen(8080);

//2. parse uploaded file

http.createServer(function (req, res) {
  if (req.url == '/fileupload') {
    var form = new formidable.IncomingForm();
    form.parse(req, function (err, fields, files) {
      res.write('File uploaded');
      res.end();
    });
  } else {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write('<form action="fileupload" method="post" enctype="multipart/form-data">');
    res.write('<input type="file" name="filetoupload"><br>');
    res.write('<input type="submit">');
    res.write('</form>');
    return res.end();
  }
}).listen(8080);

//3. save file
var http = require('http');
var formidable = require('formidable');
var fs = require('fs');

http.createServer(function (req, res) {
  if (req.url == '/fileupload') {
    var form = new formidable.IncomingForm();
    form.parse(req, function (err, fields, files) {
      var oldpath = files.filetoupload.path;
      var newpath = 'C:/Users/Kevin/code/belajarnode/temp/' + files.filetoupload.name;
      fs.rename(oldpath, newpath, function (err) {
        if (err) throw err;
        res.write('File uploaded and moved!');
        res.end();
      });
 });
  } else {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write('<form action="fileupload" method="post" enctype="multipart/form-data">');
    res.write('<input type="file" name="filetoupload"><br>');
    res.write('<input type="submit">');
    res.write('</form>');
    return res.end();
  }
}).listen(8080);

email
var nodemailer = require('nodemailer');

var transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: 'youremail@gmail.com',
    pass: 'yourpassword'
  }
});

var mailOptions = {
  from: 'youremail@gmail.com',
  to: 'myfriend@yahoo.com',
  subject: 'Sending Email using Node.js',
  text: 'That was easy!'
};

transporter.sendMail(mailOptions, function(error, info){
  if (error) {
    console.log(error);
  } else {
    console.log('Email sent: ' + info.response);
  }
});


USING EXPRESS

var express = require('express');
var app = express();

app.get('/', function(req, res) {
  res.send('Hello World!');
});

app.listen(3000, function() {
  console.log('Example app listening on port 3000!');
});


MIDDLEWARE
var express = require('express');
var app = express();

// An example middleware function
var a_middleware_function = function(req, res, next) {
  // ... perform some operations
  next(); // Call next() so Express will call the next middleware function in the chain.
}

// Function added with use() for all routes and verbs
app.use(a_middleware_function);

// Function added with use() for a specific route
app.use('/someroute', a_middleware_function);

// A middleware function added for a specific HTTP verb and route
app.get('/', a_middleware_function);

app.listen(3000);


DATABASE

//this works with older versions of  mongodb version ~ 2.2.33
var MongoClient = require('mongodb').MongoClient;

MongoClient.connect('mongodb://localhost:27017/animals', function(err, db) {
  if (err) throw err;

  db.collection('mammals').find().toArray(function (err, result) {
    if (err) throw err;

    console.log(result);
  });
});


//for mongodb version 3.0 and up
let MongoClient = require('mongodb').MongoClient;
MongoClient.connect('mongodb://localhost:27017/animals', function(err, client){
   if(err) throw err;
   
   let db = client.db('animals');
   db.collection('mammals').find().toArray(function(err, result){
     if(err) throw err;
     console.log(result);
     client.close();
   });
}

rendering template engine

var express = require('express');
var app = express();

// Set directory to contain the templates ('views')
app.set('views', path.join(__dirname, 'views'));
    
// Set view engine to use, in this case 'some_template_engine_name'
app.set('view engine', 'some_template_engine_name');




FOR BACKEND
1. make migration
php artisan make:migration create_users_table --create=users
2.a. make seeder
php artisan make:seeder UsersSeeder
2.b. make factory 
php artisan make:factory UserFactory
3. make model
php artisan make:model User
4. make controller - orderBy, paginate see that pagination is in the BACKEND
php artisan make:controller CustomerController --resource
5. make route
6. make resource
php artisan make:resource Customer


contoh 1
// We can use Laravel's query builder to construct fluent database queries with PHP. No longer are you forced to write fragile and difficult-to-read SQL queries as strings. Let me show you how it works!
Route::get('/', function()) {
    //Laravel Query builder:
    $tasks = DB::table('tasks')->latest()->get();
    return view ('welcome', compact('tasks'));

    return view ('welcome', [name: value]);
}

contoh 2
Route::get('/tasks', function()) {
    $tasks = DB::table('tasks')->latest()->get();

    return view ('tasks.index', compact('tasks'));
}

Route::get('/tasks/{id} ', function($id)) { // {id} key inside curly braces called wildcard, bisa juga ditulis {task}
    
    $tasks = DB::table('tasks')->find($id);
    dd($task);

    return view ('tasks/show', compact('tasks')); // tasks/show bisa juga tasks.show

}

contoh 3
//Now that you're familiar with the query builder, we can switch over to Eloquent: one of the core pillars of the framework. Eloquent is Laravel's Active Record implementation, which allows each of your models to be associated with a companion database table.
php artisan make:model Task
model is representation of something in your system, representation for task

namespace App;
use Illuminate\Database\Eloquent\Model //this extends laravel eloquent model

php artisan tinker //to boot up laravel shell
to tinker around  

karena dinamespace App, kita bisa mereferensikan nya sebagai App\Task

karena sudah extend eloquent model, jadi punya banyak method untuk querying and working dengan database / collection

App\Task::all()

App\Tasks::where('id', '>=', 2)->get();  get all tasks with id greater than 2
App\Tasks::pluck('body')->first();

eloquent/dedicated class vs query builder

Route::get('/tasks', function()) {
    // $tasks = DB::table('tasks')->latest()->get();
    $tasks = App\Task::all(); // hasilnya sama tapi pake model yang ini

    return view ('tasks.index', compact('tasks'));
}


class Task extends Model
{
    public function isComplete()
    {
        return false;
    }
}

$task = App\Task::first();
//untuk memanggil method yang di buat sebelumnya:
$task->isComplete();

MISALNYA
client minta kalo Task nya udah selesai, mau di archive,
nah buat lah method archive di dalam model Task, yang isinya mungkin querying database

//$tasks = DB::table('tasks')->find($id);
$task = Task::find($id); //ini ga bakal jalan kalo blom di namespace jadi App\Task

jadi enaknya di namespace aja di atas App\Task biar ga perlu tulis App\Task

php artisan make:model Task  -m

$table->boolean('completed')->default(false);

php artisan tinker
$task = new App\Task; // ini buat task baru 
$task->body = 'Go to market'; task baru itu diisi body nya sama go to market
$task->complete = false; //kalo belom dibuat default
$task->save(); // masuk deh ke dalem database

App\Task::first()->completed; //hasilnya pasti 0
App\Task::where('completed', 0)->get(); 

tapi kan query itu kepanjangan, untuk supaya lebih singkat gimana?
caranya ya buat static function di modelnya

//Declaring class properties or methods as static makes them accessible without needing an instantiation of the class. A property declared as static cannot be accessed with an instantiated class object (though a static method can).

//Members declared protected can be accessed only within the class itself and by inheriting and parent classes. 

// Static property dan static method adalah property (variabel) dan method (function) yang melekat kepada class, bukan kepada objek. Konsep static property memang ‘agak keluar’ dari konsep objek sebagai tempat melakukan proses, karena sebenarnya class hanya merupakan ‘blueprint’ saja.

//contoh lain misalnya objek mobil
//static  method: convertm ke km();
// ga static method: hitungJarakTempuh objek mobil;
contoh 1
public static function inclomplete()
{
    return static::where('completed', 0)->get();  // karena kita ada di task model
}
// WRAP QUERY INSIDE METHOD YANG MENJELASKAN METODE INI NGAPAIN SIH
App\\Task::incomplete();

contoh 2
public function scopeIncomplete($query, $val)
{
    return $query->where('completed', 0);  
}
karena ada scope, bisa masukin banya argument ke dalamnya
query scope: wrapper around particular query

App\Task::incomplete()->where('id', '>=', 2)->get();

routing, switching to query builder, to eloquent, database migration, views-blade




GOAL: make it as simple as you can possibly justfy

controller:
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

php artisan make:controller TasksController

use Illuminate\Http\Request; //diganti ga tau kenapa
use App\Task // supaya bisa langsung pakai Task di function

route model binding

contoh 1
public function show($id)
{
    $task = Task::find($id);
    return $task; // udah nih langsung dapat JSON

    return view('tasks.show', compact('task')); pakai ini kalau mau pakai view
}

contoh 2
public function show(Task $task) // ini pakai route model binding,
// ok kita punya wildcard namanya task, ada ga variable yang namanya task juga?
// kalo ada cariin dong recordnya
// bisa juga dibilang Task::find(wildcard);
{
    return $task; // udah nih langsung dapat JSON

    return view('tasks.show', compact('task')); pakai ini kalau mau pakai view
}

Form request Data
Route::get('/posts/create', 'PostsController@create');
<form method="POST" action='/posts'>

GET /posts // tampilin posts
GET /posts/create // tampilin form masukin posts
POST /posts // masukin data post baru
GET /posts/{id}/edit // tampilin form utk edit 1 post
GET /posts/{id}
PATCH /posts/{id} // masukin data edit 1 post 
DELETE /posts/{id} // delete 1 post

//use endpoint posts/{id}, instruct to delete

contohnya kalo post
Route::post('/posts', 'PostsController@store')

contoh 1
public function store()
{
    // dd(request()->all()); // tampilin request data as json
    // dd(request('title')); // tampilin request data as json
    // dd(request(['title','body'])); // tampilin request data as json
    // create a new post using the request data
    namespace App\Post di atas
    $post = new Post;
    $post->title = request('title');
    $post->body = request('body');

    // save it to the database
    $post->save();

    // redirect to homepage
    return redirect('/');
}

contoh 2 
di model: protected $fillable = ['title', 'body']; // whitelist any of these
atau protected $guarded = ['user_id']; // blacklist any of these
atau buat parent eloquent class, yang semua class lain extend

use Illuminate\Database\Eloquent\Model as Eloquent;
class Model extends Eloquent
{
    protected $guarded = [];
}

class Post extends Model // now post extends our own model, not eloquent model
{
    protected $guarded = [];
}

di post controller:
Post::create([
    'title' => request('title'),
    'body' => request('body')
]);

contoh 3
Post::create(request(['title', 'body'])); //refactor 8 code to 1

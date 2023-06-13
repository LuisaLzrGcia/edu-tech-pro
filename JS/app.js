const mysql      = require('mysql');
const connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'id19333258_admin',
  password : 'DgCheck2022$',
  database : 'mid19333258_digcompedu'
});
 
// Verificar que la conexión sea exitosa
connection.connect(function(error){
    if(error){
        console.log("ERROR")
        throw error
    }else{
        console.log("Conectado a la BD")
    }
});
 
// Se cierra la conexión
connection.end();
try {
    var api = require('car-registration-api-india');
    var fs = require('fs');

    var contents = fs.readFileSync('reg.txt', 'utf8');
    console.log(contents);

    api.CheckCarRegistrationIndia(contents,"Bhanu_tie",function(data){
        var stream = fs.createWriteStream("make.txt");
        stream.once('open', function(fd) {
            stream.write(data.Description);
            stream.end();
        });
    });
}
catch (e) {
    //console.error(e);
    var fs = require('fs');
    var stream = fs.createWriteStream("makelog.txt");
    stream.once('open', function(fd) {
        stream.write(data.Description);
        stream.end();
    });
}

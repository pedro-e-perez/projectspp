/* 
 _/_/_/_/    _/_/_/   _/          _/_/_/      _/    _/      _/_/_/     _/_/_/
 _/     _/  _/    _/  _/        _/      _/     _/   _/    _/         _/      _/
 _/     _/  _/    _/  _/        _/      _/      _/  _/    _/_/_/     _/      _/
 _/_/_/_/   _/    _/  _/        _/_/_/_/_/       _/ _/          _/   _/_/_/_/
 _/     _/  _/    _/  _/        _/      _/        _/_/          _/   _/
 _/	_/  _/_/_/   _/_/_/_/  _/      _/         _/     _/_/_/     _/              _/
 
 Acerca de nosostros www.rolavsp.com
 Bogota Colombia
 */
var rolavsp={sendVisit:function(a,b){var c={};c.Ruta=a,c.Server=b,$.ajax({url:"http://desarrollorolavsp.cloudapp.net/AdminTool/api/_usuario",type:"POST",contentType:"application/json",data:JSON.stringify(c),success:function(a,b,c){},error:function(a,b,c){}})}};

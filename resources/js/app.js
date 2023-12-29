require('./bootstrap');
window.addEventListener('swal',function(e){
  Swal.fire(e.detail);
});
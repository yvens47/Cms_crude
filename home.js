
var posts = []
function reqListener() {



  posts.push(JSON.parse(this.responseText));

}


var oReq = new XMLHttpRequest();
oReq.addEventListener("load", reqListener);
oReq.open("GET", "http://localhost:8080/CMS_Crude/ajax/post.php");
oReq.send();


var app = new Vue({
  el: '#main',
  data: {
    message: 'Hello Vue!',
    postLists: posts,
    methods: {
      adminLinks: function (type, id) {
        console.log(id);
        return 'Admin/' + type + '.php?id=' + id;
      }
    }


  }

})
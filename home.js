
var textResult = [];


// hiding row action 
function rowAction() {
  var rowAction = document.querySelectorAll('.row-action');
  rowAction.forEach(function (index) {

    index.style = 'visibility:hidden';
  });
}





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

    postLists: posts,
    methods: {
      adminLinks: function (type, id) {

        return 'Admin/' + type + '.php?id=' + id;
      },
      delete: function () {

        alert("hello");
      },
    }


  }

})



/* delete and individual post
delete post without refreshing the page
**/

function deletePost(deleteLinks) {


  // loop over each delete links
  deleteLinks.forEach(function (item) {

    item.addEventListener('click', function (event) {
      event.preventDefault();

      var postId = event.target.getAttribute('data-id'); // id of post to be deleted

      deletePostRequest(postId)  // delete post record from database table




      if (textResult[0] === 'delete') {
        // alert("delete successfully");
        // delete row from the UI
        console.log(event.target.parentNode.parentNode.parentNode.parentNode);

        event.target.parentNode.parentNode.parentNode.parentNode.style.display = 'none';



      } else {
        alert("Could not delete the post");

      }

    })
  })

}


function ajaxResponse() {

  // update textResult  | deelte or delete fail
  textResult.push(this.responseText);



}

function deletePostRequest(postId) {

  var url = 'http://localhost:8080/CMS_Crude/ajax/delete-post.php?id=' + postId
  var oReq = new XMLHttpRequest();



  oReq.addEventListener("load", ajaxResponse);
  oReq.open("GET", url);
  oReq.send();


  return textResult;

}




$(document).ready(function () {



  rowAction();

  toggleRowAction();


  var deleteLinks = document.querySelectorAll('.delete') // all delete links
  deletePost(deleteLinks);



})


// toglle the visiblity of row action
function toggleRowAction() {
  var rowsRecord = (document.querySelectorAll('.record'));
  rowsRecord.forEach((item, index) => {
    item.addEventListener('mouseenter', function (e) {
      if (e.target.children[0].querySelector('.row-action').style.visibility === 'hidden') {
        e.target.children[0].querySelector('.row-action').style.visibility = 'visible';
      }
    });
    item.addEventListener('mouseleave', function (e) {
      if (e.target.children[0].querySelector('.row-action').style.visibility === 'visible') {
        e.target.children[0].querySelector('.row-action').style.visibility = 'hidden';
      }
    });
  });
}

tinymce.init({ selector: 'textarea' });

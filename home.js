var rowRecord = document.querySelectorAll('table')
console.log(rowRecord);




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


var textResult = [];
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
        // delete row from the UI
        event.target.parentNode.parentNode.parentNode.parentNode.style.display = 'none';

        alert("The Post was delete successfully");

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
  var textResult;

  oReq.addEventListener("load", ajaxResponse);
  oReq.open("GET", url);
  oReq.send();

  return textResult;

}

window.onload = function () {

  var deleteLinks = document.querySelectorAll('.delete') // all delete links
  deletePost(deleteLinks);

  var rowAction = document.querySelectorAll('.row-action');
  rowAction.forEach(function (index) {

    index.style = 'display:none';   // hide all records links
  })

  var rowsRecord = (document.querySelectorAll('.record'))
  rowsRecord.forEach((item, index) => {

    item.addEventListener('mouseenter', function (e) {
      if (e.target.children[0].querySelector('.row-action').style.display === 'none') {
        e.target.children[0].querySelector('.row-action').style.display = 'block'
      }
    })

    item.addEventListener('mouseleave', function (e) {

      if (e.target.children[0].querySelector('.row-action').style.display === 'block') {

        e.target.children[0].querySelector('.row-action').style.display = 'none'
      }

    })

  })


}





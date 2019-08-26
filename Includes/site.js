/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () { 
   postComment();  
    
   $(".upload").submit(function(e){
       
        
        e.preventDefault();
        return false;
        
        
       
   });
   
});

// ppost user comment througn xmlhttprequest
function postComment(){

   const postCommentBtn = document.querySelector('.post_comment');
   // when form submit
   postCommentBtn.addEventListener('submit',function(e){      
      
      var xmlRequest = new XMLHttpRequest();

      xmlRequest.onreadystatechange = function(){
        if(this.readyState ==4 && this.status ==200){

         const response = JSON.parse(this.responseText);         
         console.log(response);

         // put ajax response back to the the dom;
         var newEl = document.querySelector('.comment');
         console.log(newEl);

         //reset form 
         postCommentBtn.reset();

        }

      }
      xmlRequest.open('POST', 'post_comment.php',true);
      xmlRequest.send(new FormData(postCommentBtn));
      
      e.preventDefault();
      return false;
      
   })

}



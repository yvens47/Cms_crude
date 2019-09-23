/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var UIController = (function(){

   var data = [
      '.search',
      '.comment_form',
     ]

     return {
         data : data,
     }

})()


var app = (function(ui){

  // search form 
   
   var search = function(){
      var search = document.querySelector(ui.data[0]);
      search.addEventListener('focusin', function(){         
        this.classList.add('search-form')   // scale input
        document.querySelector('.navbar').classList.remove('bg-dark-header-2')

      });

      search.addEventListener('focusout', function(e){  

         console.log(e);

         console.log(this)

         this.classList.remove('search-form');
         this.classList.add('search-form-out')   // scale input
         document.querySelector('.navbar').classList.add('bg-dark-header-2')
 
       })
      
      
   }
   search();
   // validate comment form
   var form = document.querySelector(ui.data[1]);

   form.addEventListener('submit', function(e){
      var name= document.querySelector('.name')
      var url = document.querySelector('.url')
      var text= document.querySelector('.text');
      var inputs = [name, url, text]
      validateCommentForm(inputs)


       
      e.preventDefault();
   })
   function validateCommentForm (inputs){

       var msg = document.querySelector('.msg');       
         
         if(inputs[0].value==='' ){   
                
            msg.classList.add('error');            
            msg.innerHTML = "please enter name";  
            
         } else if(inputs[1].value==='' ){
            msg.style.display='none';
            var msg = document.querySelector('.msg-url');    
            msg.classList.add('error');            
            msg.innerHTML = "Enter a valid URL"

         }else if(inputs[2].value ==='' ){
            msg.style.display='none';
            var msg = document.querySelector('.msg-text');    
            msg.classList.add('error');            
            msg.innerHTML = "Enter some text before submit"

         }else{

            // process form
            ajaxRequest('http://localhost:8080/CMS_Crude/post_comment.php', form, 'POST');
            form.reset();
         }


        

   }

   var ajaxRequest = function (url,form, request){  
      
         var  xmlRequest = new XMLHttpRequest();
         console.log(xmlRequest);
         xmlRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //document.getElementById("demo").innerHTML = this.responseText;
              console.log(this.response)
              var response = JSON.parse((JSON.stringify(this.response)));

              var m = document.querySelector('.msg-comment');
              m.innerHTML = response;
            }
          };
          xmlRequest.open(request, url, true);
         xmlRequest.send(new FormData(form));


   }
 
  return{

      

     init: function(){
       
     }
  }


})(UIController)
app.init();




$(document).ready(function () { 
  // postComment();  
  addPost();
    
   $(".upload").submit(function(e){
       
        
        e.preventDefault();
        return false;
        
        
       
   });
   
});
addPost();

function addPost (){
   
   const addPostBtn = document.querySelector('.add_post');

   addPostBtn.addEventListener('click', function(){

      alert("button click");
   })
}

// ppost user comment througn xmlhttprequest
function postComment(){

   const postCommentBtn = document.querySelector('.post_comment');
   // when form submit
   postCommentBtn.addEventListener('submit',function(e){      
      
      var xmlRequest = new XMLHttpRequest();

      xmlRequest.onreadystatechange = function(){
        if(this.readyState ==4 && this.status ==200){

         const response = JSON.parse(this);         
         console.log(response);
         alert(response);

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


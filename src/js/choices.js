$(document).ready(function (){
  $('#print-btn').click(function(){
      window.print();
  });

  $('.oneTotwenty > .row > .choices1:first').removeClass('border-top-0');
  $('.oneTotwenty > .row > .choices1:last').removeClass('border-bottom-0');

  $('.twentyoneToforty > .row > .choices1:first').removeClass('border-top-0');
  $('.twentyoneToforty > .row > .choices1:last').removeClass('border-bottom-0');

  $('.fortyoneTofifty > .row > .choices1:first').removeClass('border-top-0');
  $('.fortyoneTofifty > .row > .choices1:last').removeClass('border-bottom-0');


  $('.oneTotwenty > .row > .choices2:first').removeClass('border-top-0');
  $('.oneTotwenty > .row > .choices2:last').removeClass('border-bottom-0');

  $('.twentyoneToforty > .row > .choices2:first').removeClass('border-top-0');
  $('.twentyoneToforty > .row > .choices2:last').removeClass('border-bottom-0');

  $('.fortyoneTofifty > .row > .choices2:first').removeClass('border-top-0');
  $('.fortyoneTofifty > .row > .choices2:last').removeClass('border-bottom-0');

  //   const answers = $('.answer').text().split('')

  //   const choices = [];
  //   for (let i = 0; i < $('.circles').length; i += 4) {
  //       choices.push($('.circles').slice(i, i + 4));
  //   }

  //   // Connect answers with choices
  //   for (let i = 0; i < answers.length; i++) {
  //   const answer = answers[i];
  //   let choiceIndex;

  //   // Get the index of the answer (assuming the answer is a, b, c, or d)
  //   switch (answer) {
  //     case 'a':
  //       choiceIndex = 0;
  //       break;
  //     case 'b':
  //       choiceIndex = 1;
  //       break;
  //     case 'c':
  //       choiceIndex = 2;
  //       break;
  //     case 'd':
  //       choiceIndex = 3;
  //       break;
  //     default:
  //       // Handle any other cases or invalid answers here
  //       break;
  //   }

  // }

  // var testpaper = document.getElementById("testpaper");
  // function isOverflowing(element) {
  //   return element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth;
  // }

  
  // // console.log(lastchild);
  // if(isOverflowing(testpaper)) {
  //   $('#testpaper-div').append('<page size="A4"></page>')
  //   var nextpage = testpaper.nextElementSibling;
  //   var lastchild = document.getElementById("testpaper").lastElementChild


  //   while(isOverflowing(testpaper)) {
  //     nextpage.insertBefore(document.getElementById("testpaper").lastElementChild, nextpage.children[0]);
  //   }
  //   nextpage.insertBefore(document.getElementById("testpaper").lastElementChild, nextpage.children[0]);
  //   nextpage.insertBefore(document.getElementById("testpaper").lastElementChild, nextpage.children[0]);
  //   nextpage.insertBefore(document.getElementById("testpaper").lastElementChild, nextpage.children[0]);
  //   console.log(isOverflowing(testpaper));
    
    
  
    

  // }

});

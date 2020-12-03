window.addEventListener('load', function(ev){
    var dog = myTool.$('dog');
    var cat = myTool.$('cat');
    var other = myTool.$('other');
    var dogImg = myTool.$('dog-img');
    var catImg = myTool.$('cat-img');
    var otherImg = myTool.$('other-img');
    var title = myTool.$('title');
    // var interestDogs = dogImg.getElementsByTagName('button');
    // var interestCats = catImg.getElementsByTagName('button');
    // var interestOther = otherImg.getElementsByTagName('button');
    var interestList = myTool.$('pic').getElementsByTagName('button');
    // var select = myTool.$('select');
    // var detail = myTool.$('detail');
    // var medicalBtn = myTool.$('btn').children[1];
    // var historyBtn = myTool.$('btn').children[2];

    // interested(interestDogs, dogImg);

    dog.addEventListener('click', function(ev1){
        cat.className = '';
        other.className = '';
        dog.className = 'selected';

        myTool.show(dogImg);
        myTool.hide(catImg);
        myTool.hide(otherImg);

        // interested(interestDogs);
    });

    cat.addEventListener('click', function(ev2){
        dog.className = '';
        other.className = '';
        cat.className = 'selected';

        myTool.show(catImg);
        myTool.hide(dogImg);
        myTool.hide(otherImg);

        // interested(interestCats, catImg);
    });

    other.addEventListener('click', function(ev3){
        dog.className = '';
        cat.className = '';
        other.className = 'selected';

        myTool.show(otherImg);
        myTool.hide(catImg);
        myTool.hide(dogImg);

        // interested(interestOther, otherImg);
    });

    interest(interestList);

});

function interest(interestList){
    for(var i = 0; i<interestList.length; i++){
        var interest = interestList[i];
        interest.addEventListener('click', function(ev4){
            if(title.innerText === 'Current Available Animals for Adoption'){
                window.location.href="../html/interested.html";
            }else {
                window.location.href="../html/interested_2.html";
            };
        });    
    };
};

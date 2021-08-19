const btns = document.querySelectorAll('#btn');
const prices = document.querySelectorAll('#prix');
const libelles = document.querySelectorAll('#libelle');
const deleteBtn = document.querySelector('#delete');
const produits = [];

for(let i = 0 ; i < btns.length; i++){
    let product = {};
   product.index = btns[i].value;
   product.price = prices[i].textContent;
   product.libelle = libelles[i].textContent;
   produits.push(product);
}

let count = 1;
let result = "";





const tbody = document.querySelector('#tbody');
const tr = document.querySelector('tr');

let arr = [];
btns.forEach(btn => btn.addEventListener('click',(e)=>{
    
    let target = e.target.value;
    
    produits.forEach(item =>{
        if( item.index === target){
           if(arr.includes(item) === false ){
               arr.push(item);
        }else{
            count++;
        }   
            
        }
    }) 
    arr.map(el =>{ 
     
       result +=`
       <tr>
       <td>${el.index}</td>   
        <td>${el.price}</td>
        <td>${el.libelle}</td> 
      </tr> ` 
    
    }) 
    tbody.innerHTML = result;  
    
       
}))



    deleteBtn.addEventListener('click',(e)=>{
        console.log(arr);
       
      
    })
    

    
    
    
    
    
    

document.addEventListener("DOMContentLoaded",function(){

    let button= document.getElementById("lookup")
    button.addEventListener("click", function(event){
        
        let countryin=document.getElementById("country");
        let country=countryin.value.trim();

        fetch(`world.php?country=${encodeURIComponent(country)}`)
            .then(response => response.text())

            .then(data =>{
                let res=document.getElementById("result");
                res.innerHTML=data;
            })
            .catch(error =>{
                console.log(error);
            });

        
    
    });
});
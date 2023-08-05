<?php 
 // Read the JSON file 
$json = file_get_contents('./public/json/data.json');
$max_results = 3;

$current_page = 2;
// Decode the JSON file
$json_data = json_decode($json,true);




?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
    <link rel="stylesheet" type="text/css" href="./public/css/style.css" />
</head>
<body>

<div class="container" id="main-content">
	
        <div class="d-flex justify-content-between heading my-2">
            <h3>PEOPLE DATA<h3>
            <button onClick="loadMore()" class="btn  rounded-pill">NEXT PERSON</button>
        </div>
        <ul class="list-group">
       
            
         
            
        </ul>
        <div class="text-center my-2">
          <small class="text-light text-uppercase">Currenty <span id="no-of-list"></span> people showing</small>
        </div>
        
    
	
</div>

<?php include("includes/footer.php");?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
<script>
let current_page = 1;
var arr = <?php echo json_encode($json_data); ?>;


function loadList(){
    let max_results = 3;
    let offset = max_results * current_page;
    let part = arr.slice(0,offset)
   
    if(offset > (arr.length+max_results)){
        alert('No more people!')
        return;
    }
    let list = ``
    part.forEach(function(ele,ind){
        list +=`<li class="list-group-item d-flex">
                    <span class="index">
                    ${ind+1}
                    </span>
                    <div class="user-details w-100">
                        <div class="px-2">
                            Name: ${ele.name}
                        </div>
                        <div class="px-2">
                            Location: ${ele.location}
                        </div>
                    </div>
                
                </li>`
    });
    $('.list-group').html(list)
    $('#no-of-list').text(part.length)
}
loadList()


function loadMore(){
    current_page++;
    loadList()
}
</script>
</body>
</html>
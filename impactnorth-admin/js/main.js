// delete record
$(document).on('click', '.delete-rec', function() {
    console.log($(this).attr('data-id'));
    if(confirm("Are you sure want to delete this record?")){
        let data = {
            id: $(this).attr('data-id'),
            action: 'delete'
        }
        $.post("/ImpactNorth/impactnorth-admin/request.php", data, function(result){
            console.log(result);
            if(result === "1"){       
                $("#data-"+data.id).css('color','red');
                $("#data-"+data.id).children().eq(10).html("");
                alert("Record deleted");
            }else{
                alert("Something went wrong, try again!");
            }
        });
    }
});  
//open sidebar
openNav = () => {
    (window.innerWidth <= 450)?
    document.getElementById("mySidenav").style.width = "60vw"
        :
    document.getElementById("mySidenav").style.width = "250px";
}
//close sidebar
closeNav = () => {
    document.getElementById("mySidenav").style.width = "0";
}
// sidebar dropdown
$('.sidebar-item-dropdown').click(function(){
    $(this).next().toggleClass('d-block');
});

// set active - menu
var activeHome = location.pathname;
var activePage = activeHome.substring(activeHome.lastIndexOf('/') + 1);
var activePageQueryString = `${activePage}${location.search}`;

$('a[href="'+activeHome+'"]').parent().addClass('active');
$('a[href="'+activePage+'"]').parent().addClass('active');
$('a[href="'+activePageQueryString+'"]').addClass('active');


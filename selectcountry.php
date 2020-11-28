<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery Populate City Dropdown Based on Country Selected</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('td.test').hide();
            $('td.test2').hide();           
            $("select.country").change(function(){
                var SelectedState = $(".country option:selected").val();
                $.ajax({
                    type: "POST",
                    url: "country.php",
                    data: { state_id : SelectedState } 
                }).done(function(data){
                    if (data === '') {
                        $('td.test').hide();
                    }else{
                        $('td.test').show();
                        $("#state").html(data);
                    }
                });
            });
            $("#state").change(function(){
                var SelectedCity = $(".state option:selected").val();
                $.ajax({
                    type:"POST",
                    url:"country.php",
                    data: { city_id : SelectedCity }
                }).done(function(data){
                    if (data === '') {
                        $('td.test2').hide();
                    }else{
                        $('td.test2').show();
                        $("#cityres").html(data);
                    }
                })
            })
        });
    </script>
</head>
<body>
    <?php
    include './db_auth_register_boxed.php'; 
    ?>
    <form>
        <table>
            <tr>
                <td>
                    <label>Country:</label>
                    <select class="country">

                        <option>Select</option>
                        <?php 
                        $select_sql = "SELECT * FROM countries";
                        $result = mysqli_query($conn, $select_sql);

                        foreach ($result as $r) { ?>
                            <option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td class="test">
                    <label>State:</label>
                    <select id="state" class="state">
                        <option>Select</option>
                    </select>
                </td>
                <td class="test2">
                    <label>City:</label>
                    <select id="cityres">
                        <option>Select</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
</body> 
</html>
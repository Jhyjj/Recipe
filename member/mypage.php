<?php include_once '../include/header.php' ?>
<?php
    session_start();
    $id = $_SESSION['userId'];
     $conn = mysqli_connect("localhost","hjindo","jj6762^^","hjindo");
     $query = "select * from review where id = '$id'";
     $result = mysqli_query($conn,$query);
     function review(){
        global $result;
        while($row = mysqli_fetch_array($result)){
            echo "<tr>
                    <td>{$row['recipe']}</td>
                    <td><a href='/php/RECIPE2/reviewDetail.php?name={$row['recipe']}&no={$row['no']}'>{$row['title']}</a></td>
                    <td>{$row['id']}</td>
                    <td>{$row['date']}</td>
                </tr>";
            }
    }
    function join_name(){
        global $conn;
        global $id;
        $query3 = "select * from review inner join members on members.id = review.id where review.id = '$id'";
        $result3 = mysqli_query($conn,$query3);
        $row3 = mysqli_fetch_array($result3);
        
        echo "{$row3['name']}λμ΄";
    }
    function myrecipe(){
        global $conn;
        global $id;
        $query2 = "select * from myrecipe where id = '$id'";
        $result2 = mysqli_query($conn,$query2);
        while($row = mysqli_fetch_array($result2)){
           echo "<a href='../detail.php?mname={$row['mname']}'> 
                <li><img src='../imgs/{$row['mname']}/{$row['topimg']}'></li>
                <li>{$row['mname']}</li></a>
                <a href='../process/delete_myrecipe_process.php?no={$row['no']}'>μ­μ </a>

            ";
        }
    }
?>


    <div id="mypage_members">
        <div id='myrecipe'>
            <h3>π<?php join_name();?> μ°ν λ μνΌπ</h3>
            <ul>
            <?=myrecipe();?>
            </ul>
        </div>
        <!--  -->
        <div class='my_review'>
            <h3><?php join_name();?> μμ±ν λ¦¬λ·°β</h3>
            <table>
                <tr>
                    <th>λ μνΌλͺ</th>
                    <th>μ λͺ©</th>
                    <th>μμ±μ</th>
                    <th>μμ±μΌμ</th>
                </tr>
                <?php  review();  ?>
                

            </table>

        </div>
    </div>
            
<?php include_once '../include/footer.php' ?>
<?php
require_once "../verify.php";

if (
    isset($_POST['name']) &&
    isset($_POST['description']) &&
    isset($_POST['category']) &&
    isset($_POST['prize']) &&
    isset($_POST['stock']) &&
    isset($_POST['company']) &&
    isset($_FILES['images']) &&
    isset($_POST['submit']))
{
    $na = $_POST["name"];
    $des = $_POST['description'];
    $category = $_POST["category"];
    $availability = 1;
    $cost = $_POST["prize"];
    $items_left = $_POST["stock"];
    $company = $_POST["company"];

    //image handling
    $img = $_FILES["images"]['name'];
    move_uploaded_file($_FILES['images']['tmp_name'], '../imgs/'. $_FILES['images']['name']);
            
    $query = $pdo->prepare("INSERT INTO products(name, description, category, availability, price, stock, img, company) VALUES (?,?,?,?,?,?,?,?)");
    $query->bindParam(1, $na, PDO::PARAM_STR);
    $query->bindParam(2, $des, PDO::PARAM_STR);
    $query->bindParam(3, $category, PDO::PARAM_STR);
    $query->bindParam(4, $availability, PDO::PARAM_BOOL);
    $query->bindParam(5, $cost, PDO::PARAM_STR);
    $query->bindParam(6, $items_left, PDO::PARAM_STR);
    $query->bindParam(7, $img, PDO::PARAM_STR);
    $query->bindParam(8, $company, PDO::PARAM_STR);
    
    $query->execute([$na, $des, $category, $availability, $cost, $items_left, $img, $company]);

}
echo <<<_END
<html>
    <head>
        <title>Add Item</title>
    </head>
    <body>
        <h1>Add a new item!</h1>
        <div class="job-container input-container">
            <form action="add_item.php" method="post" enctype="multipart/form-data">
                <pre>
                    <label for="name">Item name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="description">description</label>
                    <textarea type="message" id="description" name="description" placeholder="Describe what this item is about!" required></textarea>

                    <label for="company">Company Name</label>
                    <input type="text" id="company" name="company" required>

                    <label for="category">Select Category</label>
                    <select name="category" id="category" size="1" required>
                        <option value="electronics">Electronics</option>
                        <option value="cosmetics">Cosmetics</option>
                        <option value="sports">sports</option>
                        <option value="watches">watches</option>
                    </select>

                    <label for="prize">Prize</label>
                    <input type="number" id="prize" name="prize" required>

                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" required>

                    <label for="images">Product Image</label>
                    <input type="file" id="images" name="images" multiple>

                    <input type="submit" id="submit" value="Add item" class="login" name="submit">
                    <button onClick="location.href='../index.php'">Show Results</button>
                </pre>
            </form>
        </div>
    </body>
</html>
_END;
?>
<link rel="stylesheet" href="../assets/cardstyle.css">
<link rel="stylesheet" href="../assets/cardplus.css">
<div class="card create-plus" onclick="startCreatingCard()">
    <div class="create-plus-content">
        <p>Start Creating Your Card</p>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".create-plus").click(function () {
            window.location.href = "../commons/cardCreator.php";
        });
    })

</script>
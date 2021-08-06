
<style>
  body{
    background-color: #F5F5F5;
  }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    <a class="navbar-brand" href="<?=$base_url?>parkiran/cari.php">
      <img src="<?=$base_url?>assets/img/logocipa.png" width="64" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-search fa-fw"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline ml-5 navbar-search" method="get" action="<?=$base_url?>parkiran/cari.php">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text border-0 bg-light">
              <i class="fas fa-search fa-fw"></i>
            </span>
          </div>
          <input type="text" class="form-control border-0 bg-light" placeholder="Cari tempat parkir" name="search" 
          <?=(isset($_GET["search"])) ? 'value='.$_GET["search"] : ''?>>
        </div>
      </form>
    </div>
  </div>
</nav>

	<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="form.php">
        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
        <span class="menu-title">Add product</span>
      </a>
		
    </li>
    
 <!--   <li class="nav-item">
      <a class="nav-link" href="my_product.php">
        <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
        <span class="menu-title">My Products</span>
      </a> -->
		 
    </li>
	    <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#mypro" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">My Products</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="mypro">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="my_product.php?category=all">All Products</a></li>
                  <li class="nav-item"> <a class="nav-link" href="my_product.php?category=Vagetable">Vagetable</a></li>
                  <li class="nav-item"> <a class="nav-link" href="my_product.php?category=Fruit">Fruits</a></li>
                  <li class="nav-item"> <a class="nav-link" href="my_product.php?category=Dried">Dried Fruits</a></li>
					
                </ul>
              </div>
            </li>
    
    
    
    
      
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
          <span class="menu-title">Log Out</span></a>
      </div>
    </li>
  </ul>
</nav>
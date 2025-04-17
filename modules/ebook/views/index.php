<div class="ebook-container">


    <div class="dashboard-wrapper">
        <button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2 class="logo">User Dashboard</h2>
            <nav>
                <ul>
                    <li><a href="#">🏠 Home</a></li>
                    <li><a href="#">👤 Users</a></li>
                    <li><a href="#">📦 Orders</a></li>
                    <li><a href="#">💰 Revenue</a></li>
                    <li><a href="#">💬 Messages</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="cards">

            </div>
        </main>
    </div>
</div>
<style>
    .ebook-container .sidebar-toggle {
        display: none;
        /* position: fixed;
        top: 15px;
        left: 15px; */
        z-index: 999;
        background-color: #2c3e50;
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 20px;
        margin: 10px;
        cursor: pointer;
    }

    .ebook-container .dashboard-wrapper {
        display: flex;
        align-items: flex-start;
        background-color: #2c3e50;
    }

    .ebook-container .sidebar {
        width: 220px;
        background-color: #2c3e50;
        color: #fff;
        padding: 20px;
        position: -webkit-sticky;
        /* Safari */
        position: sticky;
        top: 0;
        align-self: flex-start;
        height: fit-content;
    }

    .ebook-container .sidebar .logo {
        font-size: 20px;
        margin-bottom: 30px;
        text-align: center;
        color: white;
    }

    .ebook-container .sidebar ul {
        list-style: none;
    }

    .ebook-container .sidebar li {
        margin-bottom: 15px;
    }

    .ebook-container .sidebar a {
        color: #fff;
        text-decoration: none;
        display: block;
        padding: 8px 12px;
        border-radius: 4px;
        transition: background 0.3s;
    }

    .ebook-container .sidebar a:hover,
    .ebook-container .sidebar a.active {
        background-color: #34495e;
    }

    .ebook-container .main-content {
        flex: 1;
        padding: 30px;
        background-color: #f5f6fa;
        min-height: 70vh;
    }

    @media (max-width: 768px) {
        .ebook-container .dashboard-wrapper {
            flex-direction: column;
            background-color: white;
        }
        .ebook-container .sidebar {
            height: 100%;
            transform: translateX(-100%);
            transition: .3s;
            z-index: 998;
        }

        .ebook-container .sidebar.open {
            transform: translateX(0);
        }

        .ebook-container .sidebar-toggle {
            display: block;
        }

        .ebook-container .main-content {
            margin-left: 0;
        }
    }
</style>
<script>
  function toggleSidebar() {
    document.querySelector('.sidebar').classList.toggle('open');
  }
</script>
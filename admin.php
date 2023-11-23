<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Course Online</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="#">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-chart-bar"></i>
                    <span>Statistics</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-briefcase"></i>
                    <span>Careers</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-question-circle"></i>
                    <span>FAQ</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-star"></i>
                    <span>Testimonials</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="logout">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="images/avatar-nam.png" alt="">
            </div>
        </div>

        <div class="card--container">
            <h3 class="main--title">Today's data</h3>
            <div class="card--wrapper">
                <div class="payment--card light-red">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Payment amount</span>
                            <span class="amount--value">$500.00</span>
                        </div>
                        <i class="fas fa-dollar-sign icon dark-red"></i>
                    </div>
                    <span class="card-detail">**** **** **** 3484</span>
                </div>

                <div class="payment--card light-purple">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Payment order</span>
                            <span class="amount--value">$200.00</span>
                        </div>
                        <i class="fas fa-list icon dark-purple"></i>
                    </div>
                    <span class="card-detail">**** **** **** 5542</span>
                </div>

                <div class="payment--card light-green">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Payment amount</span>
                            <span class="amount--value">$350.00</span>
                        </div>
                        <i class="fas fa-users icon dark-green"></i>
                    </div>
                    <span class="card-detail">**** **** **** 8896</span>
                </div>

                <div class="payment--card light-blue">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Payment amount</span>
                            <span class="amount--value">$150.00</span>
                        </div>
                        <i class="fa-solid fa-check icon dark-blue"></i>
                    </div>
                    <span class="card-detail">**** **** **** 7745</span>
                </div>
            </div>
        </div>

        <div class="tabular--wrapper">
            <h3 class="main--title">Finance data</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction Type</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-05-01</td>
                            <td>Expenses</td>
                            <td>Office Supplies</td>
                            <td>$250</td>
                            <td>Office Expenses</td>
                            <td>Pending</td>
                            <td>
                                <button class="edit">Edit</button>
                                <button class="delete">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-05-02</td>
                            <td>Income</td>
                            <td>Client Payment</td>
                            <td>$500</td>
                            <td>Sales</td>
                            <td>Completed</td>
                            <td>
                                <button class="edit">Edit</button>
                                <button class="delete">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-05-03</td>
                            <td>Expense</td>
                            <td>Travel Expenses</td>
                            <td>$250</td>
                            <td>Travel</td>
                            <td>Pending</td>
                            <td>
                                <button class="edit">Edit</button>
                                <button class="delete">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">Total: $1,000</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
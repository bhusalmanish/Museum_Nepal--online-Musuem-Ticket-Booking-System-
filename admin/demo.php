

<?php include "header.php" ?>



<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
        </div>
    </div>

    <ul class="box-info">

        <li>

            <span class="text">
                <h3>2834</h3>
                <p>Visitors</p>
            </span>
        </li>
        <li>

            <span class="text">
                <h3>RS.2000</h3>
                <p>Total Sales</p>
            </span>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Orders</h3>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>

                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>

                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>

                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status process">Process</span></td>
                    </tr>
                    <tr>
                        <td>

                            <p>Patan </p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>

                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</main>
<?php include "footer.php"; ?>
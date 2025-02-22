 <!-- HR Module Section -->
 <section id="hr" class="form-section">
        <h3>Add New HR Employee</h3>
        <form method="post">
            <div class="form-group">
                <label for="emp-name"><i class="fas fa-user"></i> Employee Name:</label>
                <input type="text" id="emp-name" required>
            </div>
            <div class="form-group">
                <label for="emp-designation"><i class="fas fa-id-badge"></i> Designation:</label>
                <input type="text" id="emp-designation" required>
            </div>
            <div class="form-group">
                <label for="emp-email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="emp-email" required>
            </div>
            <div class="form-group">
                <label for="emp-phone"><i class="fas fa-phone"></i> Phone:</label>
                <input type="tel" id="emp-phone" required>
            </div>
            <input type="submit" value="Add Employee" class="btn-submit">
        </form>
    </section>
 <!-- Inventory Module Section -->
 <section id="inventory" class="form-section">
        <h3>Add New Inventory Item</h3>
        <form>
            <div class="form-group">
                <label for="item-name"><i class="fas fa-cogs"></i> Item Name:</label>
                <input type="text" id="item-name" required>
            </div>
            <div class="form-group">
                <label for="quantity"><i class="fas fa-box"></i> Quantity:</label>
                <input type="number" id="quantity" required>
            </div>
            <div class="form-group">
                <label for="location"><i class="fas fa-map-marker-alt"></i> Location:</label>
                <input type="text" id="location" required>
            </div>
            <input type="submit" value="Add Inventory Item" class="btn-submit">
        </form>
    </section>

       <!-- Finance Module Section -->
       <section id="finance" class="form-section">
        <h3>Add New Transaction</h3>
        <form>
            <div class="form-group">
                <label for="transaction-date"><i class="fas fa-calendar-alt"></i> Date:</label>
                <input type="date" id="transaction-date" required>
            </div>
            <div class="form-group">
                <label for="amount"><i class="fas fa-dollar-sign"></i> Amount:</label>
                <input type="number" id="amount" required>
            </div>
            <div class="form-group">
                <label for="type"><i class="fas fa-exchange-alt"></i> Type:</label>
                <select id="type" required>
                    <option value="Revenue">Revenue</option>
                    <option value="Expense">Expense</option>
                </select>
            </div>
            <input type="submit" value="Add Transaction" class="btn-submit">
        </form>
    </section>
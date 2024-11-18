<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h4 class="mb-4">Client Data</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="client-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be inserted here via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <nav id="pagination-nav" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <!-- Pagination links will be dynamically inserted here -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const usersTableBody = document.querySelector("#client-table tbody");
            const paginationNav = document.querySelector("#pagination-nav .pagination");

            // Fetch data and populate table
            function fetchData(page = 1) {
                fetch(`/clients?page=${page}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Populate table rows
                        populateTable(data.data, data.from);

                        // Create pagination links
                        createPagination(data);
                    })
                    .catch(error => console.error("Error fetching data:", error));
            }

            // Populate table with user data
            function populateTable(users, startIndex) {
                usersTableBody.innerHTML = ""; // Clear existing rows
                users.forEach((user, index) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${startIndex + index}</td>
                        <td>${user.firstname}</td>
                        <td>${user.lastname}</td>
                        <td>${user.email}</td>
                    `;
                    usersTableBody.appendChild(row);
                });
            }

            // Create pagination links
            function createPagination(data) {
                paginationNav.innerHTML = ""; // Clear existing links

                if (data.prev_page_url) {
                    const prevLink = createPageLink(data.current_page - 1, "Previous");
                    paginationNav.appendChild(prevLink);
                }

                for (let i = 1; i <= data.last_page; i++) {
                    const pageLink = createPageLink(i, i, i === data.current_page);
                    paginationNav.appendChild(pageLink);
                }

                if (data.next_page_url) {
                    const nextLink = createPageLink(data.current_page + 1, "Next");
                    paginationNav.appendChild(nextLink);
                }
            }

            // Create a single page link
            function createPageLink(page, text, isActive = false) {
                const li = document.createElement("li");
                li.classList.add("page-item");
                if (isActive) li.classList.add("active");

                const link = document.createElement("a");
                link.classList.add("page-link");
                link.href = "#";
                link.textContent = text;
                link.onclick = (e) => {
                    e.preventDefault();
                    fetchData(page);
                };

                li.appendChild(link);
                return li;
            }

            // Initial fetch
            fetchData();
        });
    </script>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h4 class="mb-4">Transaction Data</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="transaction-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Transaction date</th>
                                    <th>Transaction amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be inserted here via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <nav id="pagination-nav-2" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <!-- Pagination links will be dynamically inserted here -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const usersTableBody = document.querySelector("#transaction-table tbody");
            const paginationNav = document.querySelector("#pagination-nav-2 .pagination");

            // Fetch data and populate table
            function fetchData(page = 1) {
                fetch(`/transactions?page=${page}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Populate table rows
                        populateTable(data.data, data.from);

                        // Create pagination links
                        createPagination(data);
                    })
                    .catch(error => console.error("Error fetching data:", error));
            }

            // Populate table with user data
            function populateTable(users, startIndex) {
                usersTableBody.innerHTML = ""; // Clear existing rows
                users.forEach((transaction, index) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${startIndex + index}</td>
                        <td>${`${transaction.client.firstname} ${transaction.client.lastname}`}</td>
                        <td>${transaction.transaction_date}</td>
                        <td>${`$${transaction.amount}`}</td>
                    `;
                    usersTableBody.appendChild(row);
                });
            }

            // Create pagination links
            function createPagination(data) {
                paginationNav.innerHTML = ""; // Clear existing links

                if (data.prev_page_url) {
                    const prevLink = createPageLink(data.current_page - 1, "Previous");
                    paginationNav.appendChild(prevLink);
                }

                for (let i = 1; i <= data.last_page; i++) {
                    const pageLink = createPageLink(i, i, i === data.current_page);
                    paginationNav.appendChild(pageLink);
                }

                if (data.next_page_url) {
                    const nextLink = createPageLink(data.current_page + 1, "Next");
                    paginationNav.appendChild(nextLink);
                }
            }

            // Create a single page link
            function createPageLink(page, text, isActive = false) {
                const li = document.createElement("li");
                li.classList.add("page-item");
                if (isActive) li.classList.add("active");

                const link = document.createElement("a");
                link.classList.add("page-link");
                link.href = "#";
                link.textContent = text;
                link.onclick = (e) => {
                    e.preventDefault();
                    fetchData(page);
                };

                li.appendChild(link);
                return li;
            }

            // Initial fetch
            fetchData();
        });
    </script>
</x-app-layout>

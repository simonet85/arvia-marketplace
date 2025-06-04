<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Arvía</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  </head>
  <body class="flex h-screen bg-[#f9f8f4]">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg hidden md:block">
      <div class="p-6 border-b">
        <h1 class="text-2xl font-bold text-[#7a6b5f]">Arvía</h1>
      </div>
      <nav class="p-6 space-y-4 text-sm">
        <a href="#" class="block hover:text-[#7a6b5f]"><i class="fas fa-home mr-2"></i>Tableau de Bord</a>
        <a href="#" class="block hover:text-[#7a6b5f]"><i class="fas fa-box mr-2"></i>Produits</a>
        <a href="#" class="block hover:text-[#7a6b5f]"><i class="fas fa-list mr-2"></i>Catégories</a>
        <a href="#" class="block hover:text-[#7a6b5f]"><i class="fas fa-truck mr-2"></i>Commandes</a>
        <a href="#" class="block hover:text-[#7a6b5f]"><i class="fas fa-shipping-fast mr-2"></i>Suivi</a>
        <a href="#" class="block hover:text-[#7a6b5f]"><i class="fas fa-bell mr-2"></i>Notifications</a>
        <a href="#" class="block hover:text-[#7a6b5f]"><i class="fas fa-user mr-2"></i>Profil</a>
        <a href="#" class="block hover:text-[#7a6b5f]"><i class="fas fa-bicycle mr-2"></i>Coursiers</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-6">
      <header class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-[#7a6b5f]">Tableau de Bord</h2>
        <button class="md:hidden p-2 text-[#7a6b5f]">
          <i class="fas fa-bars"></i>
        </button>
      </header>

      <!-- Stats Grid -->
      <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
          <div class="bg-[#e7e5e0] rounded-full p-3">
            <i class="fas fa-box text-[#7a6b5f] text-2xl"></i>
          </div>
          <div>
            <h3 class="text-xs text-gray-500 font-semibold">Total Orders</h3>
            <p class="text-2xl font-bold text-[#493f35]">1,234</p>
            <span class="text-xs text-green-600 font-semibold">+12% from last month</span>
          </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
          <div class="bg-[#fff7e0] rounded-full p-3">
            <i class="fas fa-clock text-yellow-500 text-2xl"></i>
          </div>
          <div>
            <h3 class="text-xs text-gray-500 font-semibold">Pending Orders</h3>
            <p class="text-2xl font-bold text-[#493f35]">45</p>
            <span class="text-xs text-yellow-600 font-semibold">+5% from last month</span>
          </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
          <div class="bg-[#e0e7ff] rounded-full p-3">
            <i class="fas fa-truck text-purple-500 text-2xl"></i>
          </div>
          <div>
            <h3 class="text-xs text-gray-500 font-semibold">In Transit</h3>
            <p class="text-2xl font-bold text-[#493f35]">23</p>
            <span class="text-xs text-purple-600 font-semibold">+8% from last month</span>
          </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
          <div class="bg-[#e6fbe8] rounded-full p-3">
            <i class="fas fa-check-circle text-green-500 text-2xl"></i>
          </div>
          <div>
            <h3 class="text-xs text-gray-500 font-semibold">Completed</h3>
            <p class="text-2xl font-bold text-[#493f35]">1,166</p>
            <span class="text-xs text-green-600 font-semibold">+15% from last month</span>
          </div>
        </div>
      </section>

      <!-- Search & Filters -->
      <section class="bg-white rounded-lg shadow p-4 mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center gap-2 flex-1">
          <i class="fas fa-search text-gray-400"></i>
          <input type="text" placeholder="Search orders..." class="w-full border-none focus:ring-0 text-sm bg-transparent" />
        </div>
        <div class="flex gap-2 flex-wrap">
          <select class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none">
            <option>All Status</option>
            <option>Pending</option>
            <option>Processing</option>
            <option>Shipped</option>
            <option>Delivered</option>
            <option>Cancelled</option>
          </select>
          <select class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none">
            <option>All Priority</option>
            <option>High</option>
            <option>Medium</option>
            <option>Low</option>
          </select>
          <button class="bg-[#f9f8f4] border border-gray-200 rounded-lg px-4 py-2 text-sm flex items-center gap-2 hover:bg-[#e7e5e0]">
            <i class="fas fa-file-export"></i> Export
          </button>
        </div>
      </section>

      <!-- Orders Table -->
      <section class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold mb-4 text-[#493f35]">Orders (5)</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto text-sm text-left text-gray-700">
            <thead class="bg-[#f9f8f4] text-xs uppercase">
              <tr>
                <th class="px-6 py-3 font-semibold">Order ID</th>
                <th class="px-6 py-3 font-semibold">Customer</th>
                <th class="px-6 py-3 font-semibold">Items</th>
                <th class="px-6 py-3 font-semibold">Total</th>
                <th class="px-6 py-3 font-semibold">Status</th>
                <th class="px-6 py-3 font-semibold">Priority</th>
                <th class="px-6 py-3 font-semibold">Payment</th>
                <th class="px-6 py-3 font-semibold">Date</th>
                <th class="px-6 py-3 font-semibold">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b hover:bg-[#f6f5f2]">
                <td class="px-6 py-4 font-mono font-semibold">#ORD001</td>
                <td class="px-6 py-4">
                  <div class="font-semibold">John Doe</div>
                  <div class="text-xs text-gray-500">john@example.com</div>
                </td>
                <td class="px-6 py-4 flex items-center gap-1"><i class="fas fa-box"></i> 3 items</td>
                <td class="px-6 py-4 font-semibold">$99.99</td>
                <td class="px-6 py-4">
                  <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">Pending</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs font-semibold">High</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Paid</span>
                </td>
                <td class="px-6 py-4 text-xs text-gray-500">2024-01-15<br><span class="text-gray-400">10:30 AM</span></td>
                <td class="px-6 py-4 flex gap-2">
                  <button class="text-gray-500 hover:text-[#493f35]" title="View"><i class="fas fa-eye"></i></button>
                  <button class="text-gray-500 hover:text-[#493f35]" title="Edit"><i class="fas fa-pen"></i></button>
                  <button class="text-gray-500 hover:text-[#493f35]" title="History"><i class="fas fa-clock"></i></button>
                </td>
              </tr>
              <tr class="border-b hover:bg-[#f6f5f2]">
                <td class="px-6 py-4 font-mono font-semibold">#ORD002</td>
                <td class="px-6 py-4">
                  <div class="font-semibold">Jane Smith</div>
                  <div class="text-xs text-gray-500">jane@example.com</div>
                </td>
                <td class="px-6 py-4 flex items-center gap-1"><i class="fas fa-box"></i> 2 items</td>
                <td class="px-6 py-4 font-semibold">$149.99</td>
                <td class="px-6 py-4">
                  <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">Processing</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">Medium</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Paid</span>
                </td>
                <td class="px-6 py-4 text-xs text-gray-500">2024-01-15<br><span class="text-gray-400">09:15 AM</span></td>
                <td class="px-6 py-4 flex gap-2">
                  <button class="text-gray-500 hover:text-[#493f35]" title="View"><i class="fas fa-eye"></i></button>
                  <button class="text-gray-500 hover:text-[#493f35]" title="Edit"><i class="fas fa-pen"></i></button>
                  <button class="text-gray-500 hover:text-[#493f35]" title="History"><i class="fas fa-clipboard-list"></i></button>
                </td>
              </tr>
              <tr class="border-b hover:bg-[#f6f5f2]">
                <td class="px-6 py-4 font-mono font-semibold">#ORD003</td>
                <td class="px-6 py-4">
                  <div class="font-semibold">Bob Johnson</div>
                  <div class="text-xs text-gray-500">bob@example.com</div>
                </td>
                <td class="px-6 py-4 flex items-center gap-1"><i class="fas fa-box"></i> 1 item</td>
                <td class="px-6 py-4 font-semibold">$79.99</td>
                <td class="px-6 py-4">
                  <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs font-semibold">Shipped</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Low</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Paid</span>
                </td>
                <td class="px-6 py-4 text-xs text-gray-500">2024-01-14<br><span class="text-gray-400">02:45 PM</span></td>
                <td class="px-6 py-4 flex gap-2">
                  <button class="text-gray-500 hover:text-[#493f35]" title="View"><i class="fas fa-eye"></i></button>
                  <button class="text-gray-500 hover:text-[#493f35]" title="Edit"><i class="fas fa-pen"></i></button>
                </td>
              </tr>
              <tr class="border-b hover:bg-[#f6f5f2]">
                <td class="px-6 py-4 font-mono font-semibold">#ORD004</td>
                <td class="px-6 py-4">
                  <div class="font-semibold">Alice Brown</div>
                  <div class="text-xs text-gray-500">alice@example.com</div>
                </td>
                <td class="px-6 py-4 flex items-center gap-1"><i class="fas fa-box"></i> 4 items</td>
                <td class="px-6 py-4 font-semibold">$199.99</td>
                <td class="px-6 py-4">
                  <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Delivered</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">Medium</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Paid</span>
                </td>
                <td class="px-6 py-4 text-xs text-gray-500">2024-01-13<br><span class="text-gray-400">11:20 AM</span></td>
                <td class="px-6 py-4 flex gap-2">
                  <button class="text-gray-500 hover:text-[#493f35]" title="View"><i class="fas fa-eye"></i></button>
                  <button class="text-gray-500 hover:text-[#493f35]" title="Edit"><i class="fas fa-pen"></i></button>
                </td>
              </tr>
              <tr class="hover:bg-[#f6f5f2]">
                <td class="px-6 py-4 font-mono font-semibold">#ORD005</td>
                <td class="px-6 py-4">
                  <div class="font-semibold">Charlie Wilson</div>
                  <div class="text-xs text-gray-500">charlie@example.com</div>
                </td>
                <td class="px-6 py-4 flex items-center gap-1"><i class="fas fa-box"></i> 1 item</td>
                <td class="px-6 py-4 font-semibold">$59.99</td>
                <td class="px-6 py-4">
                  <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs font-semibold">Cancelled</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Low</span>
                </td>
                <td class="px-6 py-4">
                  <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">Refunded</span>
                </td>
                <td class="px-6 py-4 text-xs text-gray-500">2024-01-12<br><span class="text-gray-400">03:10 PM</span></td>
                <td class="px-6 py-4 flex gap-2">
                  <button class="text-gray-500 hover:text-[#493f35]" title="View"><i class="fas fa-eye"></i></button>
                  <button class="text-gray-500 hover:text-[#493f35]" title="Edit"><i class="fas fa-pen"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Footer -->
      <footer class="bg-white p-6 mt-8 shadow-md rounded-lg">
        <p class="text-center text-gray-600 text-sm">
          &copy; 2025 Arvía. Tous droits réservés.
        </p>
      </footer>
    </main>
  </body>
</html>
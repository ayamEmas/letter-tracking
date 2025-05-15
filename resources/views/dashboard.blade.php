<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-10">

        <!-- Chart Box -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">Letters per Department</h3>
                <canvas id="lettersChart" height="100"></canvas>
            </div>
        </div>

        <!-- Staff + Other Table -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:space-x-6 space-y-6 md:space-y-0">

                <!-- Staff Table -->
                <div class="md:w-1/2 bg-white p-6 shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Staff List</h3>
                    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">#</th>
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Email</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($staff as $index => $user)
                                <tr>
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-2 text-center text-gray-500">No staff found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Second Column -->
                <div class="md:w-1/2 bg-white p-6 shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Other Table or Graph</h3>
                    <!-- Your content here -->
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('lettersChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($departments->pluck('name')) !!},
                datasets: [{
                    label: 'Letters',
                    data: {!! json_encode($departments->pluck('letters_count')) !!},
                    backgroundColor: '#3b82f6',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: { display: true, text: 'Letters per Department' }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    </script>
    @endpush
</x-app-layout>

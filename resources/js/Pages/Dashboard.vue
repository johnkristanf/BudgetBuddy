<script setup>
    import { Line, Bar } from 'vue-chartjs';
    import { Chart as ChartJS, Title, Tooltip, LineElement, BarElement, PointElement, CategoryScale, LinearScale } from 'chart.js';

    ChartJS.register(Title, Tooltip, LineElement, BarElement, PointElement, CategoryScale, LinearScale);

    const cards = [
        { title: "Current Balance", value: "₱10,000" },
        { title: "Total Income", value: "₱10,000" },
        { title: "Current Expenses", value: "₱10,000" },
        { title: "75% Budget Expenses", value: "₱3,000/₱7,500", category: "This Month" },
        { title: "10% Emergency Fund", value: "₱10,000/₱50,000", category: "For 5 Months" },
        { title: "15% Investments", value: "₱1,000/₱1,500", category: "This Month"},
    ];

    const lineChartData = {
        labels: ['January', 'February', 'March'],
        datasets: [
            {
                data: [40, 20, 12],
                borderColor: '#3490dc',
                backgroundColor: 'rgba(52, 144, 220, 0.2)',
                fill: true,
                tension: 0.4, // for smooth curves
            }
        ]
    };

    const lineChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
                text: 'Daily Expenses',
                font: {
                    size: 18
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };


    const barChartData = {
        labels: ['January', 'February', 'March'],
        datasets: [{ data: [40, 20, 12], backgroundColor: ['#3490dc', '#ff6384', '#4bc0c0'] }]
    };

    const barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
                text: 'Expenses per Category',
                font: {
                    size: 18
                }
            }
        }
    }

</script>

<template>
  <Head :title="`| ${$page.component}`" />

    <div class="w-full flex flex-col justify-center items-end text-white font-semibold p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-[73%]">
            <div 
                v-for="card in cards" 
                :key="card.title" 
                class="bg-blue-600 rounded-md p-5 w-[90%]"
            >
                <h1>{{ card.title }}</h1>
                <h1 class="text-2xl">{{ card.value }}</h1>
                <p class="text-sm mt-3">{{ card.category }}</p>
            </div>
        </div>

        <div class="w-[73%] flex gap-4 mt-8">
            <div class="flex-1">
                <div class="h-64">
                    <Line
                        aria-label="Daily Expenses"
                        :options="lineChartOptions"
                        :data="lineChartData"
                    />
                </div>
            </div>

            <div class="flex-1">
                <div class="h-64">
                    <Line
                        aria-label="Monthly Expenses"
                        :options="lineChartOptions"
                        :data="lineChartData"
                    />
                </div>
            </div>
        </div>


        <div class="w-[73%] flex gap-4 mt-12">
            <div class="flex-1">
                <div class="h-64">
                    <Bar
                        aria-label="Expenses per Category"
                        :options="barChartOptions"
                        :data="barChartData"
                    />
                </div>
            </div>

            <div class="flex-1">
                <div class="h-64">
                    <Bar
                        aria-label="Budget per Category"
                        :options="barChartOptions"
                        :data="barChartData"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

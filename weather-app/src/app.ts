import { ApiService } from './services/apiService';
import { CacheService } from './services/cacheService';
import WeatherDisplay from './components/WeatherDisplay';
import SearchBar from './components/SearchBar';

const apiService = new ApiService();
const cacheService = new CacheService();

const app = () => {
    const searchBar = new SearchBar(apiService, cacheService);
    const weatherDisplay = new WeatherDisplay();

    document.getElementById('app')?.appendChild(searchBar.render());
    document.getElementById('app')?.appendChild(weatherDisplay.render());

    searchBar.onSearch((city) => {
        apiService.fetchWeatherData(city)
            .then(data => {
                weatherDisplay.update(data);
            })
            .catch(error => {
                console.error('Error fetching weather data:', error);
            });
    });
};

document.addEventListener('DOMContentLoaded', app);
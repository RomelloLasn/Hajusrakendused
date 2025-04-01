import axios from 'axios';
import { CacheService } from './cacheService';
import { WeatherData } from '../types/weatherData';

const API_KEY = 'YOUR_API_KEY'; // Replace with your actual API key
const BASE_URL = 'https://api.openweathermap.org/data/2.5/weather';

export class ApiService {
    private cacheService: CacheService;

    constructor() {
        this.cacheService = new CacheService();
    }

    public async fetchWeather(city: string): Promise<WeatherData | null> {
        const cachedData = this.cacheService.get(city);
        if (cachedData) {
            return cachedData;
        }

        try {
            const response = await axios.get(`${BASE_URL}?q=${city}&appid=${API_KEY}&units=metric`);
            const weatherData: WeatherData = response.data;
            this.cacheService.set(city, weatherData);
            return weatherData;
        } catch (error) {
            console.error('Error fetching weather data:', error);
            return null;
        }
    }
}
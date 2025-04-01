import React from 'react';
import { WeatherData } from '../types/weatherData';

interface WeatherDisplayProps {
    weatherData: WeatherData | null;
}

const WeatherDisplay: React.FC<WeatherDisplayProps> = ({ weatherData }) => {
    if (!weatherData) {
        return <div>No weather data available.</div>;
    }

    const { main, weather, name } = weatherData;

    return (
        <div className="weather-display">
            <h2>Weather in {name}</h2>
            <div className="weather-info">
                <img src={`http://openweathermap.org/img/wn/${weather[0].icon}@2x.png`} alt={weather[0].description} />
                <p>Temperature: {main.temp}°C</p>
                <p>Condition: {weather[0].description}</p>
                <p>Humidity: {main.humidity}%</p>
            </div>
        </div>
    );
};

export default WeatherDisplay;
class CacheService {
    private cache: Map<string, any>;
    private expirationTime: number;

    constructor(expirationTime: number = 3600000) { // Default to 1 hour
        this.cache = new Map();
        this.expirationTime = expirationTime;
    }

    set(key: string, value: any): void {
        const expirationDate = Date.now() + this.expirationTime;
        this.cache.set(key, { value, expirationDate });
    }

    get(key: string): any | null {
        const cachedData = this.cache.get(key);
        if (cachedData) {
            if (Date.now() < cachedData.expirationDate) {
                return cachedData.value;
            } else {
                this.cache.delete(key); // Remove expired data
            }
        }
        return null;
    }

    clear(): void {
        this.cache.clear();
    }
}

export default CacheService;
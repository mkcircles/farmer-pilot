const dev_base_url = "http://127.0.0.1:8000";
const prod_base_url = "https://farmers.nauticaltech.ug";

export const BASE_API_URL = process.env.NODE_ENV === 'production' ? `${prod_base_url}/api` : `${dev_base_url}/api`;
export const BASE_URL = process.env.NODE_ENV === 'production' ? prod_base_url : dev_base_url;
export const API_KEY = "o0k39QuFPf4BM4mTNN9l874u"
export const MAP_BOX_PUBLIC_KEY = "pk.eyJ1Ijoia2FsdWpqYSIsImEiOiJjbGpyNGFhbzQwMGU2M2VvaDNubjFhNnppIn0.mpz17Jy5Eue59jCM-ReiZQ"
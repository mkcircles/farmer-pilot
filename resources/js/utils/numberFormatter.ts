

export const numberFormatter = (num: number) => {
    if(num <= 0) return 0;
    if(isNaN(num)) return 0;
    return num.toLocaleString();

}
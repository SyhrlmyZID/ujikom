import requests
from bs4 import BeautifulSoup
from urllib.parse import urljoin, urlparse
import re

def normalize_url(url):
    if not url.startswith("http://") and not url.startswith("https://"):
        url = "http://" + url
    return url.rstrip('/')

def is_internal_url(base_url, url):
    base_domain = urlparse(base_url).netloc
    return base_domain in urlparse(url).netloc

def find_php_files(base_url):
    try:
        base_url = normalize_url(base_url)
        response = requests.get(base_url)
        response.raise_for_status()
        soup = BeautifulSoup(response.text, 'html.parser')
        
        urls = set()
        php_files = set()
        
        for link in soup.find_all('a', href=True):
            full_url = urljoin(base_url, link['href'])
            if is_internal_url(base_url, full_url):
                urls.add(full_url)
                # Jika URL mengandung file PHP, tambahkan ke set php_files
                if re.search(r'\.php($|\?)', full_url):
                    php_files.add(full_url)
        
        print(f"\n[HASIL SCANNING] {len(urls)} URL ditemukan:")
        for i, url in enumerate(urls, 1):
            print(f"{i}. {url}")
        
        print(f"\n[HASIL FILE PHP] {len(php_files)} file PHP ditemukan:")
        for i, php_file in enumerate(php_files, 1):
            print(f"{i}. {php_file}")
    
    except requests.exceptions.RequestException as e:
        print(f"Terjadi kesalahan: {e}")

if __name__ == "__main__":
    base_url = input("Masukkan URL website (contoh: google.com): ")
    print("Tunggu sebentar...\n")
    find_php_files(base_url)

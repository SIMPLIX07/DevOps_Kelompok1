from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

driver = webdriver.Chrome()

try:
    # Buka halaman login
    driver.get("http://127.0.0.1:8000/login/pelamar")

    print("Silakan login terlebih dahulu pada browser yang terbuka.")
    input("Setelah berhasil login, tekan ENTER di terminal...")

    # Buka halaman tambah portofolio
    driver.get("http://127.0.0.1:8000/portofolio/create")

    wait = WebDriverWait(driver, 10)

    # Tunggu sampai field judul muncul
    wait.until(
        EC.presence_of_element_located(
            (By.NAME, "judul")
        )
    )

    # Isi form
    driver.find_element(By.NAME, "judul").send_keys(
        "Website E-Commerce Laravel Web"
    )

    driver.find_element(By.NAME, "kategori").send_keys(
        "Web"
    )

    driver.find_element(By.NAME, "deskripsi").send_keys(
        "pembuatan Website E-Commerce Laravel Web"
    )

    driver.find_element(By.NAME, "teknologi").send_keys(
        "Laravel, MySQL, Tailwind CSS"
    )

    driver.find_element(By.NAME, "link_demo").send_keys(
        ""
    )

    driver.find_element(By.NAME, "link_repo").send_keys(
        "https://github.com/"
    )

    tanggal_mulai = driver.find_element(By.NAME, "tanggal_mulai")
    driver.execute_script(
        "arguments[0].value='2025-01-01';",
        tanggal_mulai
    )

    tanggal_selesai = driver.find_element(By.NAME, "tanggal_selesai")
    driver.execute_script(
        "arguments[0].value='2025-05-01';",
        tanggal_selesai
    )

    print("Form berhasil diisi.")

    input("Periksa data di browser. Tekan ENTER untuk submit...")

    # Submit
    driver.find_element(
        By.XPATH,
        "//button[@type='submit']"
    ).click()

    wait.until(
        EC.presence_of_element_located(
            (By.TAG_NAME, "body")
        )
    )

    print("Portofolio berhasil ditambahkan.")

    input("Tekan ENTER untuk menutup browser...")

except Exception as e:
    print("Test gagal")
    print(e)

    print("URL saat error:", driver.current_url)

    input("Terjadi error. Tekan ENTER untuk menutup browser...")

finally:
    driver.quit()
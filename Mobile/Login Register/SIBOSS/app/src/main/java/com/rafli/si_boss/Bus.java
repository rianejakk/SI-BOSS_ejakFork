package com.rafli.si_boss;

public class Bus {

    private int id_bus;
    private String nama_bus;
    private String harga_bus;
    private String status_bus;
    private int jumlah_kursi;
    private String foto_bus;
    private String date;
    private String berangkat_place;
    private String berangkat_time;
    private String tiba_place;
    private String tiba_time;

    public Bus(int id_bus, String nama_bus, String harga_bus, String status_bus, int jumlah_kursi, String foto_bus, String date, String berangkat_place, String berangkat_time, String tiba_place, String tiba_time) {
        this.id_bus = id_bus;
        this.nama_bus = nama_bus;
        this.harga_bus = harga_bus;
        this.status_bus = status_bus;
        this.jumlah_kursi = jumlah_kursi;
        this.foto_bus = foto_bus;
        this.date = date;
        this.berangkat_place = berangkat_place;
        this.berangkat_time = berangkat_time;
        this.tiba_place = tiba_place;
        this.tiba_time = tiba_time;
    }

    public int getId_bus() {
        return id_bus;
    }

    public void setId_bus(int id_bus) {
        this.id_bus = id_bus;
    }

    public String getNama_bus() {
        return nama_bus;
    }

    public void setNama_bus(String nama_bus) {
        this.nama_bus = nama_bus;
    }

    public String getHarga_bus() {
        return harga_bus;
    }

    public void setHarga_bus(String harga_bus) {
        this.harga_bus = harga_bus;
    }

    public String getStatus_bus() {
        return status_bus;
    }

    public void setStatus_bus(String status_bus) {
        this.status_bus = status_bus;
    }

    public int getJumlah_kursi() {
        return jumlah_kursi;
    }

    public void setJumlah_kursi(int jumlah_kursi) {
        this.jumlah_kursi = jumlah_kursi;
    }

    public String getFoto_bus() {
        return foto_bus;
    }

    public void setFoto_bus(String foto_bus) {
        this.foto_bus = foto_bus;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getBerangkat_place() {
        return berangkat_place;
    }

    public void setBerangkat_place(String berangkat_place) {
        this.berangkat_place = berangkat_place;
    }

    public String getBerangkat_time() {
        return berangkat_time;
    }

    public void setBerangkat_time(String berangkat_time) {
        this.berangkat_time = berangkat_time;
    }

    public String getTiba_place() {
        return tiba_place;
    }

    public void setTiba_place(String tiba_place) {
        this.tiba_place = tiba_place;
    }

    public String getTiba_time() {
        return tiba_time;
    }

    public void setTiba_time(String tiba_time) {
        this.tiba_time = tiba_time;
    }
}

package com.rafli.si_boss.model.register;

import com.google.gson.annotations.SerializedName;

public class RegisterData {

	@SerializedName("email_user")
	private String emailUser;

	@SerializedName("nama_user")
	private String namaUser;

	public void setEmailUser(String emailUser){
		this.emailUser = emailUser;
	}

	public String getEmailUser(){
		return emailUser;
	}

	public void setNamaUser(String namaUser){
		this.namaUser = namaUser;
	}

	public String getNamaUser(){
		return namaUser;
	}
}
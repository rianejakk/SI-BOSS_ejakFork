package com.rianezza.recycleview;

import android.os.Parcel;
import android.os.Parcelable;

public class modlist implements Parcelable {
    private String title;
    private String release_date;
    private String creator;
    private String category;
    private String description;

    public modlist(String title, String release_date, String creator, String category, String description) {
        this.title = title;
        this.release_date = release_date;
        this.creator = creator;
        this.category = category;
        this.description = description;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getRelease_date() {
        return release_date;
    }

    public void setRelease_date(String release_date) {
        this.release_date = release_date;
    }

    public String getCreator() {
        return creator;
    }

    public void setCreator(String creator) {
        this.creator = creator;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }


    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(this.title);
        dest.writeString(this.release_date);
        dest.writeString(this.creator);
        dest.writeString(this.category);
        dest.writeString(this.description);
    }

    public void readFromParcel(Parcel source) {
        this.title = source.readString();
        this.release_date = source.readString();
        this.creator = source.readString();
        this.category = source.readString();
        this.description = source.readString();
    }

    protected modlist(Parcel in) {
        this.title = in.readString();
        this.release_date = in.readString();
        this.creator = in.readString();
        this.category = in.readString();
        this.description = in.readString();
    }

    public static final Creator<modlist> CREATOR = new Creator<modlist>() {
        @Override
        public modlist createFromParcel(Parcel source) {
            return new modlist(source);
        }

        @Override
        public modlist[] newArray(int size) {
            return new modlist[size];
        }
    };
}

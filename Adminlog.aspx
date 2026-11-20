<%@ Page Language="C#" MasterPageFile="~/masterindex.master" AutoEventWireup="true" CodeFile="Adminlog.aspx.cs" Inherits="Default2" Title="Untitled Page" %>
<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table class="style1">
    <tr>
        <td>
    <asp:Login ID="Login1" runat="server"  BorderPadding="2"
        BorderStyle="Solid" BorderWidth="1px" Font-Names="Verdana" Font-Size="Large"
        ForeColor="#333333" Height="73px" OnAuthenticate="Login1_Authenticate" 
        Width="418px" TextLayout="TextOnTop">
        <TitleTextStyle BackColor="#990000" Font-Bold="True" Font-Size="0.9em" ForeColor="White" />
        <InstructionTextStyle Font-Italic="True" ForeColor="Black" />
        <TextBoxStyle Font-Size="0.8em" />
        <LoginButtonStyle BackColor="White" BorderColor="#CC9966" BorderStyle="Solid" BorderWidth="1px"
            Font-Names="Verdana" Font-Size="0.8em" ForeColor="#990000" />
    </asp:Login>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td>
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
</table>
</asp:Content>

